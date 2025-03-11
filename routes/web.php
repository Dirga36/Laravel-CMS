<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ===================================================================================================

//AllUser WELCOME PAGE
Route::get('/', function () {
    return view('users.home');
});

//AllUser MAIN PAGE 
Route::get('/dashboard', function () {
    return view('users.main');
})->middleware(['auth', 'verified'])->name('dashboard');

//AllUser POSTs PAGE 
Route::get('/posts', function () {
    return view('users.add-post');
})->middleware(['auth', 'verified'])->name('posts');

// ===================================================================================================

//OnlyAdmin CRUD PAGE
Route::get('/crud-page', function () {
    return view('crud');
})->middleware(['auth', 'verified'])->name('crud-page');

//Route::resource('posts', PostController::class)->middleware('auth');
