<?php

namespace App\Http\Tasks;

class CreateGDImage
{
    public function run($file)
    {
        switch (exif_imagetype($file)) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_PNG:
                return imagecreatefrompng($file);
                break;
            case IMAGETYPE_GIF:
                return imagecreatefromgif($file);
                break;
            default:
                return false;
        }
    }
}
