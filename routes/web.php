<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//})->middleware('auth');
Route::get('/', function () {
    return redirect('home');
}
);
Route::get('/login', function () { return view('login'); });
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', function () { return view('signup'); });
Route::post('/register', [UserController::class, 'create'])->name('signup');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users/{id}', [UserController::class, 'profile'])->name('users.profile');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');

Route::get('/categories/business')->name('category-business');
Route::get('/categories/transport')->name('category-transport');
Route::get('/categories/realestate')->name('category-realestate');
Route::get('/categories/construction')->name('category-construction');
Route::get('/categories/electronics')->name('category-electronics');
Route::get('/categories/clothes')->name('category-clothes');

Route::get('/categories/home')->name('category-forhome');
Route::get('/categories/production')->name('category-production');
Route::get('/categories/children')->name('category-children');
Route::get('/categories/animals')->name('category-animals');
Route::get('/categories/agriculture')->name('category-agriculture');
Route::get('/categories/hobbies')->name('category-hobbies');
