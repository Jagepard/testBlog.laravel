<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\MaterialsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\MaterialsController as AdminMaterialsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/',[MaterialsController::class, 'index'])->name('materials.list');
Route::get('/material/{slug}', [MaterialsController::class, 'item'])->name('material.item');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminMaterialsController::class, 'index'])->name('materials.list');
    Route::get('/material/add', [AdminMaterialsController::class, 'add'])->name('material.add');
    Route::post('/material/create', [AdminMaterialsController::class, 'createOrUpdate'])->name('material.create');
    Route::get('/material/edit/{id}', [AdminMaterialsController::class, 'edit'])->name('material.edit');
    Route::post('/material/update/{id}', [AdminMaterialsController::class, 'createOrUpdate'])->name('material.update');
    Route::get('/material/delete/{id}', [AdminMaterialsController::class, 'delete'])->name('material.delete');
    Route::get('/material/delimg/{id}', [AdminMaterialsController::class, 'delimg'])->name('material.delimg');
});
