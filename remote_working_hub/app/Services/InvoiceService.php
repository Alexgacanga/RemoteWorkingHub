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
        protected SubscriptionService $subscriptionService,
    )
    {}
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
        return Invoice::create([
            'subscription_id' => $subscription->id,
            'invoice_number' => $this->generateInvoiceNumber(),
            'total_amount' => $package->price,
            'paid_amount' => 0,
            'balance_amount' => $package->price,
            //TO BE ADJUSTED LATERWARDS ACCORDING TO TYPE OF SUBSCRIPTION
            'due_date' => $subscription->start_date,
            'status' => 'pending',

        ]);
    }
    public function cancelInvoice(Invoice $invoice): void{
        if ($invoice->status === ['overdue', 'partially_paid', 'paid']){
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
        $invoice->update([
            'paid_amount' => $paid,
            'balance_amount' => $balance,
        ]);
        $this->updateStatus($invoice, $balance);
        return $invoice->fresh();
    }
    public function updateStatus(Invoice $invoice, float $newBalance): void{
        if($newBalance == 0){
            $invoice->update([
                'status' => 'paid'
            ]);
            return;
        }
        if($newBalance > 0){
            $invoice->update([
                'status' => 'partially_paid'
            ]);
            return;
        }
        if($newBalance < 0){
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
