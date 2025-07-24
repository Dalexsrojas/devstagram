<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome.welcome');
})->name('welcome');

Route::get('/registro', function () {
    return view('auth.register');
})->name('registro.index');

Route::get('/login', function () {
    return view('auth.login');
})->name('login.index');




Route::post('/registro', [UserController::class, 'store'])->name('registro.store');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');
