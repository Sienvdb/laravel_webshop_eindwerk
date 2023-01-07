<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[ProductsController::class, 'showProducts']);
Route::get('/products/{product}',[ProductsController::class, 'showProduct']);

Route::get('/dashboard',[ProductsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/products/create',[ProductsController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/products',[ProductsController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard/products/{product}/edit',[ProductsController::class, 'edit'])->middleware(['auth']);
Route::put('/dashboard/products/{product}',[ProductsController::class, 'update'])->middleware(['auth']);
Route::delete('/dashboard/products/{product}',[ProductsController::class, 'destroy'])->middleware(['auth']);
Route::get('/dashboard/products/{product}',[ProductsController::class, 'show'])->middleware(['auth']);


Route::post('/orders', [OrderController::class, 'create'])->name('orders.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
