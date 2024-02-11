<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::get('login', [AdminController::class,'login'])->name('login');
Route::post('login-process', [AdminController::class,'loginProcess'])->name('login-process');

Route::middleware(['auth'])->group(function () {
    Route::resource('shops', ShopController::class);

    Route::resource('products', ProductController::class);

    Route::get('export', [ShopController::class,'export'])->name('export');
    Route::post('import', [ShopController::class,'import'])->name('import');

});
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
