<?php

namespace App\Http\Actions\Admin;

use App\Models\Materials;

class DeleteMaterial
{
    public function run($id)
    {
        (new RemoveImages)->run(Materials::findOrFail($id)->image);

        Materials::destroy($id);
    }
}
