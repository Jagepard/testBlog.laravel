<?php

namespace App\Http\Actions\Admin;

use App\Http\Tasks\CreateGDImage;
use Illuminate\Support\Facades\Storage;

class StoreImages
{
    public function run($uploadedImage)
    {
        $GDimage = (new CreateGDImage)->run($uploadedImage);
        $imgName = time() . $uploadedImage->getClientOriginalName();

        $uploadedImage->storePubliclyAs('images', $imgName, 'public');

        if ($GDimage) {
            if(!Storage::disk('public')->exists('images/thumb')){
                Storage::disk('public')->makeDirectory('images/thumb', 0777, true, true);
            }

            $imgResized = imagescale($GDimage, 150);
            imagejpeg($imgResized, storage_path('app/public/images/thumb/' . $imgName));
        }

        return $imgName;
    }
}
