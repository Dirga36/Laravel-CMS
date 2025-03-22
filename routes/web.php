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
    return view('home');
});

//AllUser POSTs PAGE 
Route::middleware(['auth', 'verified'])->group(function () {
    //AllUser MAIN PAGE 
    Route::get('/dashboard', [PostsController::class, 'index'])->name('dashboard');
    Route::get('/my-post', [PostsController::class, 'myPosts'])->name('my-post');

    //AllUser ADD POST PAGE
    Route::get('/create-post', [PostsController::class, 'create'])->name('create-post');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    //AllUser SHOW SINGLE POST PAGE
    Route::get('/dashboard/post/{id?}', [PostsController::class, 'show'])->name('post.show');
    Route::get('/edit-post/{id}', [PostsController::class, 'edit'])->name('post.edit');
    
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('post.destroy');
});

// ===================================================================================================

//OnlyAdmin CRUD PAGE
Route::get('/admin', function () {
    return view('admin-page');
})->middleware(['auth', 'verified'])->name('admin');

//Route::resource('posts', PostController::class)->middleware('auth');
