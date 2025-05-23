<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;

Route::middleware('guest')->group(function () {
    Route::get('login',[Auth\LoginController::class,'show'])->name('login');//'auth.login'
    Route::post('login',[Auth\LoginController::class,'store']);

    Route::get('register',[Auth\RegisterController::class,'show'])->name('register');// 'auth.register'
    Route::post('register',[Auth\RegisterController::class,'store']);

    Route::get('forgot-password', [Auth\ForgotPasswordController::class,'show'])
        ->name('password.request');//'auth.forgot-password'
    Route::post('forgot-password', [Auth\ForgotPasswordController::class,'store']);

    Route::get('reset-password/{token}', [Auth\ResetPasswordController::class,'show']) 
        ->name('password.reset');//'auth.reset-password')
    Route::post('reset-password/{token}', [Auth\ResetPasswordController::class,'store']) ;

});

// Route::middleware('auth')->group(function () {
//     Route::route('verify-email', 'auth.verify-email')
//         ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Route::route('confirm-password', 'auth.confirm-password')
//         ->name('password.confirm');
// });

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');