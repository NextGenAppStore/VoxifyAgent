<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OAuth\GoogleOAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/google-signup', [AuthController::class, 'signupWithGoogle'])->name('google-signup');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/redirect', [GoogleOAuthController::class, 'redirect']);
    Route::get('/auth/callback', function () {
        $user = Socialite::driver('github')->user();

        // $user->token
    });
});
