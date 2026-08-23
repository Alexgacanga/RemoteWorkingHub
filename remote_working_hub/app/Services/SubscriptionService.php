<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Option;
use App\Models\Package;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SubscriptionService
{
    public function __construct(
        protected PackageService $packageService,
        protected InvoiceService $invoiceService,
    ){}
    public function all(): Collection{
        return Subscription::with('package')
            ->latest()
            ->get();
    }
    public function store(Request $request){
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
        ]);
        Package::create($validated);
    }
    public function pending(): Collection{
        return Subscription::with('package')
            ->where('status', 'pending')
            ->latest()
            ->get();
    }
    public function active(): Collection{
        return Subscription::with('package')
            ->where('status', 'active')
            ->latest()
            ->get();
    }
    public function expired(): Collection{
        return Subscription::with('package')
            ->where('status', 'expired')
            ->latest()
            ->get();
    }
    public function cancelled(): Collection{
        return Subscription::with('package')
            ->where('status', 'cancelled')
            ->latest()
            ->get();
    }
    public function createSubscription(array $data): Subscription{
        return DB::transaction(function () use($data){
            $package = Package::with('option')
                ->findOrFail($data['package_id']);
            if (! $package->is_active){
                throw ValidationException::withMessages([
                    'package' => 'Package is inactive!'
                ]);
            }
            if(! $package->option->is_active){
                throw ValidationException::withMessages([
                    'option' => 'Option is inactive!'
                ]);
            }
            $exists = Subscription::where('customer_id', $data['customer_id'])
            ->where('package_id', $data['package_id'])
            ->whereIn('status', ['active', 'pending'])
            ->exists();

            if ($exists){
                    throw ValidationException::withMessages([
                        'subscription' => 'Customer already has an active or pending subscription for this package.'
                    ]);
                }
            $start = Carbon::parse($data['start_date'])->startOfDay();
            $no_of_days = $data['no_of_days'] ?? null;
            $end = $this->packageService->calculateEndDate($package, $no_of_days, $start);

            $subscription = Subscription::create([
                'customer_id' => $data['customer_id'],
                'package_id' => $data['package_id'],
                'start_date' => $start,
                'end_date' => $end,
                'no_of_days' => $no_of_days,
                'status' => 'pending',
            ]);
            $this->invoiceService->createInvoice($subscription);
            return $subscription;
        });
    }
    public function cancelSubscription(Subscription $subscription): void{
        if ($subscription->status === 'active'){
            throw ValidationException::withMessages([
                'subscription' => 'Cannot cancel an active subscription.'
            ]);
        }
        $subscription->update(['status' => 'cancelled']);
    }
    public function activateSubscription(Subscription $subscription): void{
        if ($subscription->status !== 'cancelled'){
            throw ValidationException::withMessages([
                'subscription' => 'Cannot activate a non-cancelled subscription.'
            ]);
        }
        $subscription->update(['status' => 'pending']);
    }
    public function deleteSubscription(string $id): void{
        $subscription = Subscription::findOrFail($id);
        if ($subscription->invoice->whereIn('status', ['partially_paid', 'overdue', 'paid'])->exists()){
            throw ValidationException::withMessages([
                'subscription' => 'Cannot delete a subscription with associated invoices.'
            ]);
        }
        $subscription->delete();
    }
}
