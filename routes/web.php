<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class, 'home'])->name('homepage');
Route::get('/Contatti',[FrontController::class, 'contact'])->name('contact');
Route::post('/send',[FrontController::class, 'mail'])->name('mail');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);