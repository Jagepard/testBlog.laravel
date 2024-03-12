<?php

namespace App\Http\Actions\Admin;

use App\Models\Materials;
use Illuminate\Http\Request;
use App\Http\Tasks\Translator;

class SetMaterial
{
    public function run(Request $request, $id)
    {
        $validated = $request->validate([
            'title'  => 'required|min:6',
            'upload' => 'image|max:10240|mimes:jpeg,jpg,gif,bmp,png',
            'image'  => 'max:255'
        ]);

        return Materials::updateOrCreate(['id' => $id], [
            'title' => $validated['title'],
            'slug'  => (new Translator)->run($validated['title']),
            'text'  => $validated['text'] ?? '',
            'image' => (new UploadImage)->run($request, $validated) ?? $request->image ?? '',
        ]);
    }
}
