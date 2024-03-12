<?php

namespace App\Http\Tasks;

use App\Models\Materials;

class SetMaterial
{
    public function run($data, $id)
    {
        return Materials::updateOrCreate(['id' => $id], [
            'title' => $data['title'],
            'slug'  => (new Translator)->run($data['title']),
            'text'  => $data['text'] ?? '',
        ]);
    }
}
