<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    public function __construct()
    {
        //
    }
    public function all(): Collection{
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->latest()
            ->get();
    }
    public function getCustomerPayments(Customer $customer): Collection{
        return Payment::query()
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();
    }
    public function paginate(int $perPage = 20): LengthAwarePaginator{
        return Payment::query()
            ->with([
                'invoice',
                'user',
                'customer'
            ])
            ->latest()
            ->paginate($perPage);
    }
    public function validateAmount(Payment $payment): void{
        if($payment->amount <= 0){
            throw new \DomainException('Payment must be greater than zero!');
        }
    }
    public function validateMethod(Payment $payment): void{
        if(! in_array($payment->payment_method, ['cash', 'mpesa'])){
            throw new \DomainException('Invalid payment method. Only cash and mpesa are allowed!');
        }
    }
    public function record(Payment $payment): Payment{
        return DB::transaction(function () use($payment){
            $this->validateAmount($payment);
            $this->validateMethod($payment);
            $payment->save();
            return $payment->refresh();
        });
    }
    public function search(string $keyword): Collection{
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
    public function mpesaPayments(): Collection{
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('payment_method', 'mpesa')
            ->get();
    }
    public function cashPayments(): Collection{
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('payment_method', 'cash')
            ->get();
    }
    public function certainPackagePayments(Package $package): Collection{
        return Payment::query()
            ->with([
                'customer',
                'user',
                'invoice'
            ])
            ->where('package', $package->name)
            ->get();
    }
}
