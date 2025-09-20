<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // kembali ke halaman login
})->name('logout');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah routing utama aplikasi Voting OSIS
|
*/

// Halaman utama
Route::get('/', function () {
    return redirect('/login'); // otomatis arahkan ke login
});

// Auth (login, register, logout) dari laravel/ui
Auth::routes();

// Group untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Dashboard sederhana setelah login
    Route::get('/home', function () {
        return redirect()->route('vote.index');
    })->name('home');

  Route::middleware(['auth'])->group(function () {
    Route::get('/vote', [App\Http\Controllers\VoteController::class, 'index'])->name('vote.index');
    Route::post('/vote', [App\Http\Controllers\VoteController::class, 'store'])->name('vote.store');
    Route::get('/result', [App\Http\Controllers\VoteController::class, 'result'])->name('vote.result');
    
});

});
