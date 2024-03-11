<?php

use App\Http\Controllers\Admin\MaterialsController as AdminMaterialsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\MaterialsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/',[MaterialsController::class, 'index'])
    ->name('Materials::list');
Route::get('/material/{slug}',[MaterialsController::class, 'item'])
    ->name('Materials::item');


Route::get('/admin',[AdminMaterialsController::class, 'index'])
    ->name('Materials::list');

