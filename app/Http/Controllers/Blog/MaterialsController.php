<?php

namespace App\Http\Controllers\Blog;

use App\Models\Materials;
use Illuminate\Http\Request;
use App\Http\Tasks\GetIdFromSlug;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'materials' => Materials::where('status', 1)->paginate(15)
        ]);
    }

    public function item($slug)
    {
        return view('blog.item', [
            'material' => Materials::findOrFail((new GetIdFromSlug)->run($slug))
        ]);
    }
}
