<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class , 'index']);
Route::get('/detail-product/{slug}', [FrontEndController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [FrontEndController::class, 'detailCategory'])->name('detail.category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/cart', [FrontEndController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [FrontEndController::class, 'addTocart'])->name('cart.add');
    Route::delete('/cart/{id}', [FrontEndController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/checkout', [FrontEndController::class, 'checkout'])->name('checkout');
});

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/userList', [DashboardController::class, 'userList'])->name('userList');
    Route::put('/resetPassword/{$id}', [DashboardController::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class)->except(['show']);
    Route::resource('/product.gallery', ProductGalleryController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/my-transaction', MyTransactionController::class)->only('index');
    Route::get('/my-transaction/{id}/{slug}',[ MyTransactionController::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
    Route::get('/transaction/{id}/{slug}', [TransactionController::class, 'showTransactionUserByAdminWithSlugAndId'])->name('transaction.showTransactionUserByAdminWithSlugAndId');

});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/my-transaction', TransactionController::class)->only('index');
    Route::get('/my-transaction/{id}/{slug}', [MyTransactionController::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
});

// artisan call
Route::get('/artisan-call', function(){
    Artisan::call('storage:link');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'success';
});