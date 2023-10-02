<?php

use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Backend\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Backend\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Backend\Auth\NewPasswordController;
use App\Http\Controllers\Backend\Auth\PasswordController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Auth\VerifyEmailController;
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

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [BackendController::class, 'profile'])->name('profile');

        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});
