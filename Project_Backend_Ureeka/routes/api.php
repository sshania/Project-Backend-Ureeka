<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('getBook', [BookController::class, 'getBookApi']);
Route::post('createBook', [BookController::class, 'createBookApi']);
Route::post('updateBook/{id}', [BookController::class, 'updateBookApi']);
Route::get('deleteBook/{id}', [BookController::class, 'deleteBookApi']);