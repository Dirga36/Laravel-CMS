<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin/home');
});

Route::get('/user', function () {
    return view('user/home');
});
Route::get('/user/posts', function () {
    return view('user/posts');
});
