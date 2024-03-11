<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materials;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'materials' => Materials::where('status', 1)->paginate(15)
        ]);
    }
}
