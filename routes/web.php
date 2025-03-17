<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
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

//AllUser POSTs PAGE 
Route::middleware(['auth', 'verified'])->group(function () {
    //AllUser MAIN PAGE 
    Route::get('/dashboard', [PostsController::class, 'index'])->name('dashboard');
    Route::get('/my-post', [PostsController::class, 'myPosts'])->name('my-post');

    //AllUser ADD POST PAGE
    Route::get('/add-post', [PostsController::class, 'create'])->name('add-post');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
});

// ===================================================================================================

//OnlyAdmin CRUD PAGE
Route::get('/crud', function () {
    return view('crud');
})->middleware(['auth', 'verified'])->name('crud-page');

//Route::resource('posts', PostController::class)->middleware('auth');
