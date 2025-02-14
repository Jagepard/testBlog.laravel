<?php

namespace App\Http\Actions\Admin;

use Illuminate\Support\Facades\Storage;

class RemoveImages
{
    public function run(?string $imgName)
    {
        if (!empty($imgName)) {
            Storage::disk('public')->delete('images/' . $imgName);
            Storage::disk('public')->delete('images/thumb/' . $imgName);
        }
    }
}
