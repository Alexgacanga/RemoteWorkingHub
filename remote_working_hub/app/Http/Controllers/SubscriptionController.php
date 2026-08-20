<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Services\CustomerService;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(
        protected SubscriptionService $subscriptionService,
        protected CustomerService $customerService,
    ) {}
    public function index()
    {
        $subscriptions = $this->subscriptionService->all();
        return view('admin.subscriptions', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDayPass(string $id)
    {
        $customer = Customer::findOrFail($id);
        $subscriptionPackages = Package::where('is_active', true)->whereIn('time_options', ['week', 'month'])->get();
        $packages = Package::where('is_active', true)->whereIn('time_options', ['day'])->get();
        return view('pages.add-subscription-day-pass', compact('customer', 'packages'));
    }

    public function storeDayPass(Request $request, string $customerId)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'no_of_days' => 'required|integer|min:1',
            'start_date' => 'required|date',
        ]);
        $data = [
            'customer_id' => $customerId,
            'package_id'  => $validated['package_id'],
            'no_of_days' => $validated['no_of_days'],
            'start_date'  => $validated['start_date'],
        ];
        $this->subscriptionService->createSubscription($data);
        return redirect()->route('invoices.index');
    }
    public function createWeekly(string $id)
    {
        $customer = Customer::findOrFail($id);
        $packages = Package::where('is_active', true)->whereIn('time_options', ['week'])->get();
        return view('pages.add-subscription-weekly', compact('customer', 'packages'));
    }

    public function storeWeekly(Request $request, string $customerId)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
        ]);
        $data = [
            'customer_id' => $customerId,
            'package_id'  => $validated['package_id'],
            'start_date'  => $validated['start_date'],
        ];
        $this->subscriptionService->createSubscription($data);
        return redirect()->route('subscriptions.index');
    }
    public function createMonthly(string $id)
    {
        $customer = Customer::findOrFail($id);
        $packages = Package::where('is_active', true)->whereIn('time_options', ['month'])->get();
        return view('pages.add-subscription-monthly', compact('customer', 'packages'));
    }

    public function storeMonthly(Request $request, string $customerId)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
        ]);
        $data = [
            'customer_id' => $customerId,
            'package_id'  => $validated['package_id'],
            'start_date'  => $validated['start_date'],
        ];
        $this->subscriptionService->createSubscription($data);
        return redirect()->route('subscriptions.index');
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
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
