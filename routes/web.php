<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/cobaLogout', [LoginController::class, 'cobaLogout'])->name('cobaLogout');
