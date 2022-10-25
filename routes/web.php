<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('verified');


Route::middleware(['auth'])->middleware('verified')->prefix('diary')->controller(DiaryController::class)->group(function () {
    Route::get('/', 'index')->name('diary');
    Route::get('/create', 'create')->name('diary.create');
    Route::get('/detail/{uuid}', 'detail')->name('diary.detail');
    Route::get('/edit/{uuid}', 'edit')->name('diary.edit');
    Route::post('/create', 'store')->name('diary.store');
    Route::PATCH('/update', 'update')->name('diary.update');
    Route::delete('/destroy/{id}', 'destroy')->name('book.destroy');
});

require __DIR__.'/auth.php';
