<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
