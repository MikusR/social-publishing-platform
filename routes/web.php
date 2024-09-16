<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return app(ProfileController::class)->show(Auth::user());
    })->name('my-profile');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');
});

Route::Resource('posts', PostController::class)
    ->middleware(['auth']);

require __DIR__.'/auth.php';
