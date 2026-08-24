<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\InvoiceSequence;
use App\Models\LastNumber;
use App\Models\Subscription;
use Illuminate\Validation\ValidationException as ValidationException;

use function Symfony\Component\Clock\now;

class InvoiceService
{
    public function __construct(
    )
    {}
    public function all(){
        return Invoice::with('subscription')
            ->latest()
            ->get();
    }
    private function generateInvoiceNumber(): string{
        $date = now()->format('Ymd');
        $lastInvoiceNumber = LastNumber::where('doc_type', 'invoice')->value('last_number');
        $nextInvoiceNumber = $lastInvoiceNumber + 1;
        LastNumber::updateOrCreate(
            ['doc_type' => 'invoice'],
            ['last_number' => $nextInvoiceNumber]
        );
        return sprintf(
            'INV-%s-%05d',
            $date,
            $nextInvoiceNumber
        );
    }
    public function createInvoice(Subscription $subscription): Invoice{
        $package = $subscription->package;
        $customer = $subscription->customer->findOrFail($subscription->customer_id);
        $invoiceOverdue = Invoice::query()
            ->where('customer_id', $customer->id)
            ->whereIn('status', [
                'overdue'
                ])
                ->orderBy('created_at', 'desc')
                ->lockForUpdate()
                ->first();
        $paidAmount = 0;
        if($invoiceOverdue){
            $paidAmount = abs($invoiceOverdue->balance_amount);
            $invoiceOverdue->update([
                'balance_amount' => 0,
                'status' => 'paid'
            ]);
        }
        $balanceAmount = $package->price - $paidAmount;
        $invoice = Invoice::create([
            'subscription_id' => $subscription->id,
            'customer_id' => $subscription->customer->id,
            'invoice_number' => $this->generateInvoiceNumber(),
            'total_amount' => $package->price,
            'paid_amount' => $paidAmount,
            'balance_amount' => $balanceAmount,
            'due_date' => $this->dueDate($subscription) ?? null,
            'status' => 'pending',
        ]);
        $this->updateStatus($invoice, $balanceAmount, $package->price);
        return $invoice->fresh();
    }
    public function dueDate(Subscription $subscription){
        if($subscription->package->time_options === 'month'){
            $due_date = $subscription->start_date->addDays(10);
            return $due_date;
        }
        if($subscription->package->time_options === 'week'){
            $due_date = $subscription->start_date->addDays(2);
            return $due_date;
        }
    }
    public function cancelInvoice(Invoice $invoice): void{
        if ($invoice->status === ['overdue', 'partially paid', 'paid']){
            throw ValidationException::withMessages([
                'invoice' => 'Cannot cancel this invoice!'
            ]);
        }
        $invoice->update([
            'status' => 'cancelled'
        ]);
    }
    // public function cancelOnDeadline(Invoice $invoice): void{
    //     if ($invoice->subscription()->value('end_date') < now() && $invoice->status === 'pending'){
    //         $invoice->update([
    //             'status' => 'cancelled'
    //         ]);
    //     }
    //     else{
    //         throw ValidationException::withMessages([
    //             'invoice' => 'Cannot cancel this invoice!'
    //         ]);
    //     }
    // }
    public function updateTotals(Invoice $invoice): Invoice{
        $paid = $invoice->payments()->sum('amount');
        $balance = $invoice->total_amount - $paid;
        $total = $invoice->total_amount;
        $invoice->update([
            'paid_amount' => $paid,
            'balance_amount' => $balance,
            'total_amount' => $total
        ]);
        $this->updateStatus($invoice, $balance, $total);
        return $invoice->fresh();
    }
    public function updateStatus(Invoice $invoice, float $balance, float $total): void{
        if($balance === 0){
            $invoice->update([
                'status' => 'paid'
            ]);
            return;
        }
        if($balance > 0 && $balance < $total){
            $invoice->update([
                'status' => 'partially paid'
            ]);
            return;
        }
        if($balance < 0){
            $invoice->update([
                'status' => 'overdue'
            ]);
            return;
        }
        $invoice->update([
            'status' => 'pending'
        ]);
    }
    public function remainingBalance(Invoice $invoice): float{
        return $invoice->balance_amount;
    }
    public function isPaid(Invoice $invoice): bool{
        return $invoice->balance_amount <= 0;
    }
    public function hasBalance(Invoice $invoice): bool{
        return $invoice->balance_amount > 0;
    }

}
