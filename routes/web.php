<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/Dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
