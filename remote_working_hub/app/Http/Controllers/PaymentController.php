<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Services\InvoiceService;
use App\Services\PaymentService;
use App\Services\SubscriptionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected InvoiceService $invoiceService,
        protected SubscriptionService $subscriptionService
    )
    {}
    public function index()
    {
        $payments = $this->paymentService->all();
        return view('admin.payments', compact('payments'));
    }

    public function createCashPayment(string $id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('pages.add-cash-payment', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCash(Request $request, string $id)
    {
        DB::transaction(function () use ($request, $id) {
        $invoice = Invoice::findOrFail($id);
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        Payment::create([
            ...$validated,
            'payment_date' => Carbon::today(),
            'fname' => $invoice->subscription->customer->fname,
            'lname' => $invoice->subscription->customer->lname,
            'invoice_id' => $invoice->id,
            'user_id' => $invoice->subscription->user->id ?? null,
            'customer_id' => $invoice->subscription->customer->id,
            'phone_number' => null,
            'bill_reference' => $invoice->subscription->customer->payment_id,
            'payment_method' => 'cash',
            'transaction_id' => null,
            'package_id' => $invoice->subscription->package->id,
            ]);
        $this->invoiceService->updateTotals($invoice);
        $this->subscriptionService->updateStatus($invoice);

    });
        return redirect()->route('payments.index')->with('success', 'Cash payment created successfully.');

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
