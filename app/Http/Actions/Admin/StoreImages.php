<?php

namespace App\Http\Actions\Admin;

use App\Http\Tasks\CreateGDImage;

class StoreImages
{
    public function run($uploadedImage)
    {
        $GDimage = (new CreateGDImage)->run($uploadedImage);
        $imgName = time() . $uploadedImage->getClientOriginalName();

        $uploadedImage->storePubliclyAs('images', $imgName, 'public');

        if ($GDimage) {
            $imgResized = imagescale($GDimage, 150);
            imagejpeg($imgResized, storage_path('app/public/images/thumb/' . $imgName));
        }

        return $imgName;
    }
}
