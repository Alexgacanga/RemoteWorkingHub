<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function __construct()
    {
        //
    }
    public function generatePaymentId(): String{
        do{
            $rand_no = random_int(1,999);
            $id =
            now()->format('Ym')
            . str_pad($rand_no, 3, '0', STR_PAD_LEFT);
        }
        while(
            Customer::where('payment_id', $id)
                ->exists()
                );
        return $id;
    }
    public function create(Customer $customer): Customer{
        $customer->payment_id = $this->generatePaymentId();
        $customer->save();
        return $customer->fresh();
    }
}
