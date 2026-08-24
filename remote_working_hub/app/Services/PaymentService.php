<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Receipt;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

class PaymentService
{
    public function __construct(
        protected ReceiptService $receiptService,
        protected InvoiceService $invoiceService,
        protected SubscriptionService $subscriptionService
    ) {
        //
    }
    public function all(): Collection
    {
        return Payment::query()
            ->with([
                'customer',
                'invoice'
            ])
            ->latest()
            ->get();
    }
    public function getCustomerPayments(Customer $customer): Collection
    {
        return Payment::query()
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();
    }
    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return Payment::query()
            ->with([
                'invoice',
                'user',
                'customer'
            ])
            ->latest()
            ->paginate($perPage);
    }
    public function validateAmount(Payment $payment): void
    {
        if ($payment->amount <= 0) {
            throw new \DomainException('Payment must be greater than zero!');
        }
    }
    public function validateMethod(Payment $payment): void
    {
        if (! in_array($payment->payment_method, ['cash', 'mpesa'])) {
            throw new \DomainException('Invalid payment method. Only cash and mpesa are allowed!');
        }
    }
    public function record(Payment $payment): Payment
    {
        return DB::transaction(function () use ($payment) {
            $this->validateAmount($payment);
            $this->validateMethod($payment);
            $payment->save();
            return $payment->refresh();
        });
    }
    public function search(string $keyword): Collection
    {
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('amount', 'like', "%{$keyword}%")
            ->orWhere('payment_method', 'like', "%{$keyword}%")
            ->orWhere('received_by', 'like', "%{$keyword}%")
            ->orWhere('transaction_reference', 'like', "%{$keyword}%")
            ->orWhere('payment_date', 'like', "%{$keyword}%")
            ->get();
    }
    public function mpesaPayments(): Collection
    {
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('payment_method', 'mpesa')
            ->get();
    }
    public function cashPayments(): Collection
    {
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('payment_method', 'cash')
            ->get();
    }
    public function certainPackagePayments(Package $package): Collection
    {
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('package', $package->name)
            ->get();
    }
    public function processC2BPayment(array $callback): void
    {
        if (Payment::where('transaction_id', $callback['transaction_id'])->exists()) {
        return;
    }
        DB::transaction(function () use ($callback) {

            // MATCHES THE CUSTOMER ID WITH THE BILL REFERENCE
            $customer = Customer::where(
                'payment_id',
                $callback['bill_reference']
            )->firstOrFail();
            if(! $customer){
                throw new Exception('Customer not found');
            }
            // GETS INVOICES MATCHING THE GOTTEN CUSTOMER ID AND HAVE STATUS PENDING OR PARTIALLY PAID. GETS THE LATEST INVOICE
            $invoice = Invoice::query()
                ->where('customer_id', $customer->id)
                ->whereIn('status', [
                    'pending',
                    'partially paid'
                ])
                ->orderBy('created_at', 'asc')
                ->lockForUpdate()
                ->first();
            if (! $invoice) {
            $invoice = Invoice::query()
                ->where('customer_id', $customer->id)
                ->orderBy('created_at', 'desc')
                ->first();

            if (! $invoice) return; // Exit if the customer has absolutely zero invoices
        }

                Payment::create([
                    'customer_id' => $customer->id,
                    'invoice_id' => $invoice->id,
                    'package_id' => $invoice->subscription->package_id,
                    'amount' => $callback['transaction_amount'],
                    'payment_method' => 'MPESA',
                    'transaction_id' => $callback['transaction_id'],
                    'phone_number' => $callback['phone_number'],
                    'fname' => $callback['fname'],
                    'lname' => $callback['lname'],
                    'payment_date' => now(),
                    'bill_reference' => $callback['bill_reference'],
                ]);
                $this->invoiceService->updateTotals($invoice);
                $this->subscriptionService->updateStatus($invoice);

                // $receipt = new Receipt();
                // $this->receiptService
                //     ->generate($receipt, $payment);
        });
    }
}
