<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class, 'home'])->name('homepage');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);