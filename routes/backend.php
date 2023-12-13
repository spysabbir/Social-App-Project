<?php

use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Auth\PasswordController;
use App\Http\Controllers\Backend\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Auth\NewPasswordController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [BackendController::class, 'profile'])->name('profile');

        Route::patch('/profile', [BackendController::class, 'profileUpdate'])->name('profile.update');

        Route::get('/all/user', [BackendController::class, 'allUser'])->name('all.user');
        Route::get('/user/status/{id}', [BackendController::class, 'userStatus'])->name('user.status');
        Route::get('/user/view/{id}', [BackendController::class, 'userView'])->name('user.view');

    });

});
