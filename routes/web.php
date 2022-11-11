<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\UserController;
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
    Route::get('/detail/{uuid}', 'detail')->where('uuid', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('diary.detail');
    Route::get('/edit/{uuid}', 'edit')->where('uuid', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('diary.edit');
    Route::post('/create', 'store')->name('diary.store');
    Route::PATCH('/update', 'update')->name('diary.update');
    Route::delete('/destroy/{uuid}', 'destroy')->where('uuid', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('book.destroy');
});

Route::middleware(['auth'])->middleware('verified')->prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/my_page', 'index')->name('user.my_page');
    Route::get('/edit', 'edit')->name('user.edit');
    Route::get('/edit_select', 'edit_select')->name('user.edit_select');
    Route::get('/edit_name', 'edit_name')->name('user.edit_name');
    Route::patch('/update_name/{id}', 'update_name')->where('id', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('user.name_update');
    Route::get('/edit_email', 'edit_email')->name('user.edit_email');
    Route::patch('/update_email/{id}', 'update_email')->where('id', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('user.email_update');
    Route::get('/edit_password', 'edit_password')->name('user.edit_password');
    Route::patch('/password_update/{id}', 'update_password')->where('id', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('user.password_update');
    Route::get('/confirm_destroy', 'confirm_destroy')->name('user.confirm_destroy');
    Route::delete('/destroy/{uuid}', 'destroy')->where('uuid', '([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})')->name('user.destroy');
});

require __DIR__.'/auth.php';
