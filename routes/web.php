<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MollieController;

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

Route::get('/',[ProductsController::class, 'showProducts'])->name('');
Route::get('/products/{product}',[ProductsController::class, 'showProduct']);

Route::get('/dashboard',[ProductsController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/products/create',[ProductsController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/products',[ProductsController::class, 'store'])->middleware(['auth']);

Route::get('/dashboard/products/{product}/edit',[ProductsController::class, 'edit'])->middleware(['auth']);
Route::put('/dashboard/products/{product}',[ProductsController::class, 'update'])->middleware(['auth']);
Route::delete('/dashboard/products/{product}',[ProductsController::class, 'destroy'])->middleware(['auth']);
Route::get('/dashboard/products/{product}',[ProductsController::class, 'show'])->middleware(['auth']);

Route::get('/orders',[OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('orders');
Route::get('/admin',[OrderController::class, 'showOrders'])->middleware(['auth', 'verified'])->name('admin');
Route::get('/admin/{order}',[OrderController::class, 'adminUpdateOrder'])->middleware(['auth', 'verified'])->name('adminUpdateOrder');
Route::post('/ordedrs', [OrderController::class, 'create'])->name('index')->middleware(['auth']);;
Route::post('/orders', [OrderController::class, 'store'])->middleware(['auth'])->name('orders');
Route::delete('/orders/{order}',[OrderController::class, 'destroy'])->middleware(['auth']);
Route::get('/pay/{user}', [OrderController::class, 'pay'])->middleware(['auth'])->name('pay');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Mollie Payment
Route::get('mollie-payment-success',[MollieController::class, 'paymentSuccess'])->name('mollie.payment.success');
Route::get('mollie-create-payment',[MollieController::class,'createPayment'])->name('mollie.create.payment');
Route::get('create-mollie-subscription',[MollieController::class,'createMollieSubscription'])->name('create.mollie.subscription');

require __DIR__.'/auth.php';
