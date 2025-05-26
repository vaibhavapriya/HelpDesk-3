<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('clienthome');
})->name('home');
Route::get('/kb', function () {
    return view('guest.knowledge');
})->name('kb');
Route::get('/admin', function () {
    return view('adminhome');
})->name('adminhome');

Route::resource('tickets', TicketController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('profile',[ProfileController::class,'show'])->name('profile');//'auth.login'
    Route::post('profile',[ProfileController::class,'store'])->name('profile-p');
});

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

require __DIR__.'/authr.php';
