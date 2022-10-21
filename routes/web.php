<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('verified');


Route::middleware(['auth'])->prefix('diary')->group(function () {
    Route::get('/', [DiaryController::class, 'index'])->name('diary');
});

require __DIR__.'/auth.php';
