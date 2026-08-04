<?php

namespace App\Services;

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Ramsey\Collection\Collection;

class PackageService
{
    public function __construct()
    {
        //
    }
    public function all(): Collection{
        return Package::with('option')
        ->orderBy('name')
        ->get();
    }
    public function is_active(): Collection{
        return Package::where('is_active',true)
        ->with('option')
        ->orderBy('name')
        ->get();
    }
    public function create(array $data): Package{
        return Package::create($data);
    }
    public function update(Package $package, array $data): Package{
        $package->update($data);
        return $package->fresh();
    }
    public function activate(Package $package): void{
        $package->update([
            'is_active' => true
        ]);
    }
    public function deactivate(Package $package): void{
        $package->update([
            'is_active' => false
        ]);
    }

    public function delete(Package $package): void{
        // CHECK IF THERE ARE ACTIVE SUBSCRIPTIONS ALREADY
        if ($package->subscriptions()->exists()){
            throw ValidationException::withMessages([
                'package' => 'Package has subscriptions.'
            ]);
        }
        $package->delete();
    }
    public function calculateEndDate(Package $package, Carbon $startDate): Carbon{
        return match($package->time_options){
            'day' => $startDate
                ->copy()
                ->addDays($package->days_duration),
            'week' => $startDate
                ->copy()
                ->addDays(7),
            'month' => $startDate
                ->copy()
                ->addMonths(1),
            default => throw new \InvalidArgumentException(
                'Invalid duration time.'
            )
        };
    }
}
