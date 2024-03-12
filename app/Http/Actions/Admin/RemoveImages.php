<?php

namespace App\Http\Actions\Admin;

use Illuminate\Support\Facades\Storage;

class RemoveImages
{
    public function run(?string $imgName)
    {
        if (!empty($imgName)) {
            Storage::delete('public/images/' . $imgName);
            Storage::delete('public/images/thumb/' . $imgName);
        }
    }
}
