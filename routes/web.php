<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ProductsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/products/create',[ProductsController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/products',[ProductsController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard/products/{id}/edit',[ProductsController::class, 'edit'])->middleware(['auth']);
Route::get('/dashboard/products/{product}',[ProductsController::class, 'show'])->middleware(['auth']);


Route::get('/orders')->middleware(['auth', 'verified'])->name('orders.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
