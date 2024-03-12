<?php

namespace App\Http\Actions\Admin;

use Illuminate\Http\Request;
use App\Http\Tasks\CreateGDImage;

class UploadImage
{
    public function run(Request $request, $validated)
    {
        if (array_key_exists('upload', $validated)) {
            if ($request->has('image')) {
                (new RemoveImages)->run($request->image);
            }

            return (new StoreImages)->run($validated['upload']);
        }
    }
}
