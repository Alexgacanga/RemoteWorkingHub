<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Collection;

use function Illuminate\Support\now;

class ReceiptService
{
    public function __construct()
    {
        //
    }
    public function getPaymentReceipt(Payment $payment): Receipt{
            return Receipt::query()
                ->with([
                    'customer',
                    'invoice'
                ])
                ->where('payment_id', $payment->id)
                ->firstOrFail();
    }
    public function getCustomerReceipts(Customer $customer): Collection{
        return Receipt::query()
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();
    }
    public function generateReceiptNumber(): string{
        $date = now()->format('Ymd');
        $lastReceiptNumber = Receipt::latest('id')->first();
        $nextReceiptNumber = $lastReceiptNumber ? $lastReceiptNumber->id + 1 : 1;
        return sprintf(
            'INV-%s-%05d',
            $date,
            $nextReceiptNumber
        );
    }
    public function generate(Receipt $receipt, Payment $payment){
        $receipt->receipt_number = $this->generateReceiptNumber();
        $receipt->total_amount = $payment->amount;
        $receipt->payment_method = $payment->method;
        $receipt->package_id = $payment->package_id;
        $receipt->payment_id = $payment->id;
        $receipt->customer_id = $payment->customer_id;
        $receipt->user_id = $payment->user_id;
        $receipt->issued_at = now();
        $receipt->save();
        return $receipt->fresh();
    }
}
