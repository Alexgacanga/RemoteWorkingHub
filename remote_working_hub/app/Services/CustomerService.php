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
    // public function create(Customer $customer): Customer{
    //     $customer->payment_id = $this->generatePaymentId();
    //     $customer->save();
    //     return $customer->fresh();
    // }
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
    public function all(Request $request){
        $query = Customer::query();

        if ($request->has('status') && strtolower($request->status) !== 'all') {
            $query->where('status', $request->status);
        }
        $customer = $query->paginate(10)->appends($request->query());
        return $customer;
    }
    public function active(){
        return Customer::where('status', 'active')->get();
    }
    public function dormant(){
        return Customer::where('status', 'dormant')->get();
    }
}
