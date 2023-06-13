<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoriesController::class);
});
Route::resource('books', BookController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
