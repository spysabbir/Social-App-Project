<?php

use App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Frontend\Auth\NewPasswordController;
use App\Http\Controllers\Frontend\Auth\PasswordController;
use App\Http\Controllers\Frontend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Frontend\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\Auth\VerifyEmailController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->name('verification.verify')->middleware(['signed', 'throttle:6,1']);
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send')->middleware('throttle:6,1');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::middleware(['verified'])->group(function () {
        Route::get('/', [FrontendController::class, 'index'])->name('index');
        Route::get('/follower', [FrontendController::class, 'follower'])->name('follower');
        Route::get('/following', [FrontendController::class, 'following'])->name('following');

        Route::get('/follower/status/{id}', [FrontendController::class, 'followerStatus'])->name('follower.status');

        Route::get('/timeline/{username}', [FrontendController::class, 'timeline'])->name('timeline');

        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::resource('post', PostController::class);
        Route::get('/post/like/{id}', [PostController::class, 'postLike'])->name('post.like');
        Route::get('post/like/list/{id}', [PostController::class, 'postLikeList'])->name('post.like.list');

        Route::post('post/comment/{id}', [PostController::class, 'postComment'])->name('post.comment');
        Route::get('post/comment/delete/{id}', [PostController::class, 'postCommentDelete'])->name('post.comment.delete');
        Route::get('post/comment/list/{id}', [PostController::class, 'postCommentList'])->name('post.comment.list');

    });
});
