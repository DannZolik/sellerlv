<?php

use App\Http\Controllers\AdvertController;
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

Route::get('/users/{id}', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/categories/{category}', [AdvertController::class, 'index'])->name('category-show');

Route::get('/adverts/create', [AdvertController::class, 'create_index'])->name('adverts.create')->middleware('auth');
Route::post('/adverts/create', [AdvertController::class, 'create'])->name('adverts.post.create')->middleware('auth');

Route::get('adverts/{id}/delete', [AdvertController::class, 'delete'])->name('adverts.get.delete')->middleware('auth');

Route::post('adverts/{id}/update', [AdvertController::class, 'update'])->name('adverts.post.update')->middleware('auth');
