<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profiles/{user}', [ProfileController::class, 'index'])->name('profiles.show');
Route::view('/login', 'auth.login')->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profiles/{user}/info', [ProfileController::class, 'info'])->name('profile.info');
    Route::patch('/profiles/{user}', [ProfileController::class, 'save'])->name('profile.save');

    //name, email ans password / delete account
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Posts
    Route::get('/p/create', [PostController::class, 'create']);
    Route::post('/p', [PostController::class, 'store']);
    Route::get('/p/{post}', [PostController::class, 'show']);
});

require __DIR__ . '/auth.php';
