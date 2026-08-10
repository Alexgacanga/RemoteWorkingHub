<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Services\OptionService;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct(
        protected OptionService $optionService,
    )
    {}
    public function index()
    {
        $option = $this->optionService->all();
        return view('admin.options', compact('option'));
    }

    public function create()
    {
        return view('admins.options.create');
    }
    public function store(Request $request)
    {   $data = $request->validate([
         'name' => 'required|string|max:255'
            ]);
        $this->optionService->create($data);
        return redirect('admin.options');
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
        return redirect('options.activate');
    }
    public function deactivate(string $id)
    {
        $option = $this->optionService->find($id);
        $this->optionService->deactivate($option);
        return redirect('options.deactivate');
    }
    public function edit(string $id){
        $option = $this->optionService->find($id);
        return view('options.edit', compact('option'));
    }
    public function update(Request $request, string $id)
    {   $option = $this->optionService->find($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $this->optionService->update($option, $data);
        return redirect('admins.options');
    }
    public function destroy(string $id)
    {
        $option = $this->optionService->find($id);
        $this->optionService->delete($option);
        return redirect('admins.options');
    }
}
