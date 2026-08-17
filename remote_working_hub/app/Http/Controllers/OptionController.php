<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Services\OptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OptionController extends Controller
{
    public function __construct(
        protected OptionService $optionService,
    ) {}
    public function index(Request $request)
    {
        $query = Option::query();

        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';

            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', $searchTerm)
                    ->orWhere('description', 'LIKE', $searchTerm);
            });
        }

        $options = $query->latest()->paginate(8)->withQueryString();

        return view('admin.options', [
            'options' => $options
        ]);
    }

    public function create()
    {
        return view('pages.add-option');
    }
    public function store(Request $request)
    {
        $this->optionService->store($request);
        return redirect()->route('options.index')->with('success', 'Option created successfully.');
    }
    public function show(string $id)
    {
        $option = $this->optionService->find($id);
        return view('options.show', compact('option'));
    }
    public function activate(string $id)
    {
        $option = $this->optionService->find($id);
        $this->optionService->activate($option);
        return redirect()->route('options.index');
    }
    public function deactivate(string $id)
    {
        $option = $this->optionService->find($id);
        $this->optionService->deactivate($option);
        return redirect('options.deactivate');
    }
    public function edit(string $id)
    {
        $option = $this->optionService->find($id);
        return view('pages.edit-option', compact('option'));
    }
    public function update(Request $request, string $id)
    {
        $option = $this->optionService->find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean', // Assuming the switch passes a boolean/1/0 value
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_cover_image' => 'nullable|boolean',
        ]);

        // Handle image removal (if the "X" button was clicked)
        if ($request->input('remove_cover_image')) {
            if ($option->cover_image) {
                Storage::disk('public')->delete($option->cover_image);
            }
            $validatedData['cover_image'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image if it exists to save space
            if ($option->cover_image) {
                Storage::disk('public')->delete($option->cover_image);
            }
            $validatedData['cover_image'] = $request->file('cover_image')->store('pictures', 'public');
        }

        // Remove the temporary 'remove_cover_image' flag before passing to the model update
        unset($validatedData['remove_cover_image']);

        // Send the full validated payload to your service/model
        $this->optionService->update($option, $validatedData);

        return redirect()->route('options.index')->with('success', 'Option updated successfully.');
    }
    public function destroy(string $id)
    {
        $option = $this->optionService->find($id);
        $this->optionService->delete($option);
        return redirect()->route('options.index');
    }
}
