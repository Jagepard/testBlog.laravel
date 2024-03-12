<?php

namespace App\Http\Controllers\Admin;

use App\Models\Materials;
use Illuminate\Http\Request;
use App\Http\Tasks\SetMaterial;
use App\Http\Controllers\Controller;

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

    public function createOrUpdate(Request $request, $id = null)
    {
        $validated = $request->validate([
            'title' => 'required|min:6',
        ]);

        (new SetMaterial)->run($validated, $id);

        return redirect()->route("admin.materials.list")->withSuccess('You have signed-in');
    }
}
