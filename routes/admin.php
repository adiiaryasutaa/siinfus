<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::controller(NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/create', 'create')->name('news.create');
    Route::post('/news/store', 'store')->name('news.store');
    Route::get('/news/{news:slug}/edit', 'edit')->name('news.edit');
    Route::put('/news/{news:slug}/edit', 'update')->name('news.update');
    Route::delete('/news/{news:slug}/delete', 'destroy')->name('news.destroy');
});
