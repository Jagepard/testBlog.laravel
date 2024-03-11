<?php

namespace App\Http\Tasks;

class GetIdFromSlug
{
    public function run(string $slug): string
    {
        $slug = strip_tags($slug);

        return (strpos($slug, '_') !== false) ? strstr($slug, '_', true) : $slug;
    }
}
