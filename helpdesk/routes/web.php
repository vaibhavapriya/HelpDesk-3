<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
Route::get('/', function () {
    return view('clienthome');
})->name('home');
Route::get('/kb', function () {
    return view('guest.knowledge');
})->name('kb');
Route::get('/admin', function () {
    return view('adminhome');
})->name('adminhome')->middleware('role:admin');

Route::resource('tickets', TicketController::class);



Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[ProfileController::class,'show'])->name('profile');//'auth.login'
    Route::post('/profile/{id}',[ProfileController::class,'store'])->name('profile-p');
    Route::post('/ticket/{ticket}/comment',[ReplyController::class,'store'])->name('comment');
});



require __DIR__.'/authr.php';
