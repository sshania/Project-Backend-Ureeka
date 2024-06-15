<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/book', [BookController::class, 'index'])->name('book.index')->middleware(IsUser::class);
Route::get('/book/create', [BookController::class, 'create'])->name('book.create')->middleware(IsAdmin::class);
Route::post('/book', [BookController::class, 'store'])->name('book.store')->middleware(IsAdmin::class);
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit')->middleware(IsAdmin::class);
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update')->middleware(IsAdmin::class);
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy')->middleware(IsAdmin::class);