<?php

namespace App\Http\Controllers\Admin;

use App\Models\Materials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Actions\Admin\SetMaterial;
use App\Http\Actions\Admin\RemoveImages;
use App\Http\Actions\Admin\DeleteMaterial;

class MaterialsController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'materials' => Materials::where('status', 1)->orderBy('id','desc')->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.add');
    }

    public function edit($id)
    {
        return view('admin.edit', [
            'material' => Materials::findOrFail($id)
        ]);
    }

    public function delete($id)
    {
        (new DeleteMaterial)->run($id);

        return redirect()->route("admin.materials.list");
    }

    public function createOrUpdate(Request $request, $id = null)
    {
        (new SetMaterial)->run($request, $id);

        return redirect()->route("admin.materials.list")->withSuccess('You have signed-in');
    }

    public function delimg($id)
    {
        (new RemoveImages)->run(Materials::findOrFail($id)->image);
        Materials::updateOrCreate(['id' => $id], ['image' => '']);

        return redirect()->route("admin.materials.list");
    }
}
