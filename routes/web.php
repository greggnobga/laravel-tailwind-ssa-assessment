<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::group(['middleware' => 'web'], function () {
//     Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
//     Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
//     Route::get('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
//     Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
//     Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
// });

Auth::routes();

/** Macro route. */
Route::softDeletes('/users/{user}', UserController::class);

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard.index');

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

    Route::get('/users/trashed', [App\Http\Controllers\UserController::class, 'trashed'])->name('users.trashed');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    Route::get('/users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('/users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

    Route::get('/users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/users/{id}/restore', [App\Http\Controllers\UserController::class, 'restore'])->name('users.restore');
    Route::post('/users/{id}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
});
