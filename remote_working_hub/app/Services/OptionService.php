<?php

namespace App\Services;

use App\Models\Option;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\get;

class OptionService
{
    public function __construct()
    {
        //
    }
    public function all(): Collection{
        return Option::withCount('packages')
        ->orderBy('name')
        ->get();
    }
    public function is_active(): Collection{
        return Option::is_active()
        ->withCount('packages')
        ->orderBy('name')
        ->get();
    }
    public function create(array $data): Option{
        return Option::create($data);
    }
    public function update(Option $option, array $data): Option{
        $option->update($data);
        return $option->fresh();
    }
    public function activate(Option $option): void{
        $option->update([
            'is_active' => true
        ]);
    }
    public function deactivate(Option $option): void{
        $option->update([
            'is_active' => false
        ]);
    }
    public function delete(Option $option): void{
        if ($option->packages()->exists()){
            throw ValidationException::withMessages([
                'option' => 'Cannot delete a service that has packages.'
            ]);
        }
        $option->delete();
    }
}
