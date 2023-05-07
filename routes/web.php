<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.client.index')->name('index');

Route::redirect('/home', '/admin');

Route::redirect('/login', '/admin/login');
