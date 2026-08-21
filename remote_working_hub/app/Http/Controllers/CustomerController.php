<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService
    )
    {}

public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('status') && strtolower($request->status) !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';

            $query->where(function ($q) use ($searchTerm) {
                $q->where('fname', 'LIKE', $searchTerm)
                  ->orWhere('lname', 'LIKE', $searchTerm)
                  ->orWhere('email', 'LIKE', $searchTerm)
                  ->orWhere('payment_id', 'LIKE', $searchTerm);
            });
        }

        $customers = $query->latest()->paginate(10)->withQueryString();

        return view('admin.customers', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.add-customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->customerService->store($request);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $customer = $this->customerService->find($id);
        return view('pages.edit-customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   try {
        $this->customerService->update($request, $id);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        }catch (\Exception $e) {
        return redirect()->route('customers.index')->with('error', 'Failed to update customer. Please try again.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
