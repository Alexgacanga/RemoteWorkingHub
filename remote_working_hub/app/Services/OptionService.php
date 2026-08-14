<?php

namespace App\Services;

use App\Models\Option;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\get;

class OptionService
{
    public function __construct()
    {
        //
    }
    
    public function find(string $id): Option{
        return OPtion::findOrFail($id);
    }
    public function is_active(): Collection{
        return Option::where('is_active', true)
        ->withCount('packages')
        ->orderBy('name')
        ->get();
    }
    public function create(array $data): Option{
        return Option::create($data);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);
         if ($request->hasFile('cover_image')) {

        $path = $request->file('cover_image')->store('pictures', 'public');

    }
        Option::create([
            ...$validated,
            'cover_image' => $path ?? null
        ]);
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
        // DENY DELETION IF THERE IS AN ACTIVE PACKAGE ALREADY
        if ($option->packages()->exists()){
            throw ValidationException::withMessages([
                'option' => 'Cannot delete a service that has package(s).'
            ]);
        }
        $option->delete();
    }
}
