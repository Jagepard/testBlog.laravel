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
Route::get('/material/{slug}', [MaterialsController::class, 'item'])->name('materials.item');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminMaterialsController::class, 'index'])->name('materials.list');
});
