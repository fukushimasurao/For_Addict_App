<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard')->middleware('verified');


Route::middleware(['auth'])->prefix('diary')->group(function () {
    Route::get('/', [DiaryController::class, 'index'])->name('diary');
    Route::get('/create', [DiaryController::class, 'create'])->name('diary.create');

    Route::get('/detail/{id}', [DiaryController::class, 'detail'])->name('diary.detail');
    Route::get('/edit/{id}', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::post('/create', [DiaryController::class, 'store'])->name('diary.store');
    Route::PATCH('/update', [DiaryController::class, 'update'])->name('diary.update');
    Route::delete('/destroy/{id}', [DiaryController::class, 'destroy'])->name('book.destroy');
});

require __DIR__.'/auth.php';
