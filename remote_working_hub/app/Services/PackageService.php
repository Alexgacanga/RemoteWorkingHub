<?php

namespace App\Services;

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class PackageService
{
    public function __construct()
    {
        //
    }
    public function all(){
        return Package::with('option')
        ->orderBy('name')
        ->get();
    }
    public function is_active(){
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
                ->addDays(30),
            default => throw new \InvalidArgumentException(
                'Invalid duration time.'
            )
        };
    }
}
