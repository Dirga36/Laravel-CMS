<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return view('users.add-post');
});

// FIRST DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// CRUD PAGE
Route::get('/crud-page', function () {
    return view('admin.crud');
})->middleware(['auth', 'verified'])->name('crud-page');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::resource('posts', PostController::class)->middleware('auth');

// routes/web.php
Route::controller(UserController::class)->group(function () {
    //Route::get('/users', 'index')->name('users');
    //Route::get('/users/{id}', 'show')->name('users.detail');
    Route::get('/users/create', 'create')->name('users.create');
    Route::patch('/users', 'store')->name('users.store');
});
