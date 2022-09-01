<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//products
Route::prefix('/products')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::post('/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('/{task_id}/update', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/{task_id}/delete', [ProductsController::class, 'delete'])->name('products.delete');
    Route::get('/{task_id}/status', [ProductsController::class, 'status'])->name('products.status');
});
