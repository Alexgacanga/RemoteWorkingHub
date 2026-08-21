<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Package;
use App\Models\Subscription;
use App\Services\PackageService;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class PackageController extends Controller
{

public function __construct(
    protected PackageService $packageService,
)
{}
    public function index(Request $request)
    {
        $query = Package::query();

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';

            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', $searchTerm)
                    ->orWhere('description', 'LIKE', $searchTerm)
                    ->orWhere('price', 'LIKE', $searchTerm);
            });
        }

        if ($request->filled('time_options')) {
        $query->where('time_options', $request->time_options);
    }
        $packages = $query->orderByRaw("CASE WHEN is_active = 1 THEN 0 ELSE 1 END")->latest()->paginate(4)->withQueryString();

        return view('admin.packages', [
            'packages' => $packages,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = Option::where('is_active', true)->get();
        return view('pages.add-package', [
            'options' => $options
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->packageService->store($request);
        return redirect()->route('packages.index');
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
        $options= Option::where('is_active', true)->get();
        $package = $this->packageService->find($id);
        return view('pages.edit-package', compact('package', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = $this->packageService->find($id);
        $validated = $request->validate([
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'required|boolean',
            'time_options' => 'required|in:day,week,month'
        ]);
        $this->packageService->update($package, $validated);
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = $this->packageService->find($id);
        $this->packageService->delete($package);
        return redirect()->route('packages.index');
    }
}
