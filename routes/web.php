<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
})->middleware('auth');
Route::get('/login', function () { return view('login'); });
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', function () { return view('signup'); });
Route::post('/register', [UserController::class, 'create'])->name('signup');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users/{id}', [UserController::class, 'profile'])->name('users.profile');
