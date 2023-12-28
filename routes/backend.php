<?php

use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Auth\PasswordController;
use App\Http\Controllers\Backend\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Auth\NewPasswordController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Editor\EditorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('backend')->name('backend.')->group(function () {
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    Route::middleware(['backend.auth'])->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/dashboard', [BackendController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [BackendController::class, 'profile'])->name('profile');
        Route::patch('/profile', [BackendController::class, 'profileUpdate'])->name('profile.update');
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::middleware(['role:Super Admin'])->group(function(){
            Route::get('/all/staff', [SuperAdminController::class, 'allStaff'])->name('all.staff');
            Route::get('/staff/status/{id}', [SuperAdminController::class, 'staffStatus'])->name('staff.status');
            Route::get('/staff/view/{id}', [SuperAdminController::class, 'staffView'])->name('staff.view');
        });

        // Route::middleware(['role:Admin'])->group(function(){
            Route::get('/all/editor', [AdminController::class, 'allEditor'])->name('all.editor');
            Route::get('/editor/status/{id}', [AdminController::class, 'editorStatus'])->name('editor.status');
            Route::get('/editor/view/{id}', [AdminController::class, 'editorView'])->name('editor.view');
        // });

        // Route::middleware(['role:Editor'])->group(function(){
            Route::get('/all/user', [EditorController::class, 'allUser'])->name('all.user');
            Route::get('/user/status/{id}', [EditorController::class, 'userStatus'])->name('user.status');
            Route::get('/user/view/{id}', [EditorController::class, 'userView'])->name('user.view');

            Route::get('/all/post', [EditorController::class, 'allPost'])->name('all.post');
            Route::get('/post/status/{id}', [EditorController::class, 'postStatus'])->name('post.status');
            Route::get('/post/view/{id}', [EditorController::class, 'postView'])->name('post.view');

        // });
    });
});
