<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Option;
use App\Models\Package;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SubscriptionService
{
    public function __construct(
        protected PackageService $packageService,
        protected InvoiceService $invoiceService,
    ){}
    public function all(): Subscription{
        return Subscription::with('package')
            ->orderBy(Subscription::with('customer')->customer()->name)
            ->get();
    }
    public function pending(): Subscription{
        return Subscription::with('package')
            ->where('status', 'pending')
            ->orderBy(Subscription::latest())
            ->get();
    }
    public function active(): Subscription{
        return Subscription::with('package')
            ->where('status', 'active')
            ->orderBy(Subscription::latest())
            ->get();
    }
    public function expired(): Subscription{
        return Subscription::with('package')
            ->where('status', 'expired')
            ->orderBy(Subscription::latest())
            ->get();
    }
    public function cancelled(): Subscription{
        return Subscription::with('package')
            ->where('status', 'cancelled')
            ->orderBy(Subscription::latest())
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
            function ensureNoActiveSubscription(int $customerId, int $packageId): void{
                $exists = Subscription::where('customer_id', $customerId)
                    ->where('package_id', $packageId)
                    ->whereIn('status', [
                        'active',
                        'pending',
                    ])
                    ->exists();
                if ($exists){
                    throw ValidationException::withMessages([
                        'subscription' => 'Customer already has an active or pending subscription for this package.'
                    ]);
                }
            }
            $start = Carbon::parse($data['start_date']);
            $end = $this->packageService->calculateEndDate($package, $start);

            $subscription = Subscription::create([
                'customer_id' => $data['customer_id'],
                'package_id' => $data['package_id'],
                'start_date' => $start,
                'end_date' => $end,
                'status' => 'pending',
            ]);
            $this->invoiceService->createInvoice($subscription);
        });
    }
}
