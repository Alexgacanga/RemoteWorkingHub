<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');

            $url = asset('storage/' . $path);

            return response()->json([
                'location' => $url
            ]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }
}
