<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    public function __construct()
    {
        //
    }
    public function generatePaymentId(): String{
        do{
            $rand_no = random_int(1,9999);
            $id =
                now()->format('ym')
                . str_pad($rand_no, 4, '0', STR_PAD_LEFT);
        }
        while(
            Customer::where('payment_id', $id)
                ->exists()
                );
        return $id;
    }
    public function find(string $id): Customer{
        return Customer::findOrFail($id);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'string|max:255',
            'email' => 'email',
            'id_no' => 'string|nullable',
            'phone_no' => 'string|nullable',
            'status' => 'string'
        ]);
        Customer::create([
            ...$validated,
            'payment_id' => $this->generatePaymentId(),
        ]);

    }
}
