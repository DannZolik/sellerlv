<?php

use App\Http\Controllers\AdvertCategoryController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\PaidAdvertController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserDataTypeController;
use App\Http\Controllers\UserTypesController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function(){
    Route::get('/adverts', [AdvertController::class, 'get']);
    Route::get('/adverts/{advertID}', [AdvertController::class, 'profile']);
    Route::post('/adverts/create', [AdvertController::class, 'create']);
    Route::post('/adverts/update', [AdvertController::class, 'update']);
    Route::post('/adverts/delete', [AdvertController::class, 'delete']);

    Route::get('/advertCategories', [AdvertCategoryController::class, 'get']);
    Route::get('/advertCategories/{advertCategoryID}', [AdvertCategoryController::class, 'profile']);
    Route::post('/advertCategories/create', [AdvertCategoryController::class, 'create']);
    Route::post('/advertCategories/update', [AdvertCategoryController::class, 'update']);
    Route::post('/advertCategories/delete', [AdvertCategoryController::class, 'delete']);

    Route::get('/PaidAdvert', [PaidAdvertController::class, 'get']);
    Route::get('/PaidAdvert/{PaidAdvertID}', [PaidAdvertController::class, 'profile']);
    Route::post('/PaidAdvert/create', [PaidAdvertController::class, 'create']);
    Route::post('/PaidAdvert/update', [PaidAdvertController::class, 'update']);
    Route::post('/PaidAdvert/delete', [PaidAdvertController::class, 'delete']);

    Route::get('/UserData', [UserDataController::class, 'get']);
    Route::get('/UserData/{UserDataID}', [UserDataController::class, 'profile']);
    Route::post('/UserData/create', [UserDataController::class, 'create']);
    Route::post('/UserData/update', [UserDataController::class, 'update']);
    Route::post('/UserData/delete', [UserDataController::class, 'delete']);

    Route::get('/UserDataType', [UserDataTypeController::class, 'get']);
    Route::get('/UserDataType/{UserDataTypeID}', [UserDataTypeController::class, 'profile']);
    Route::post('/UserDataType/create', [UserDataTypeController::class, 'create']);
    Route::post('/UserDataType/update', [UserDataTypeController::class, 'update']);
    Route::post('/UserDataType/delete', [UserDataTypeController::class, 'delete']);

    Route::get('/UserTypes', [UserTypesController::class, 'get']);
    Route::get('/UserTypes/{UserTypeID}', [UserTypesController::class, 'profile']);
    Route::post('/UserTypes/create', [UserTypesController::class, 'create']);
    Route::post('/UserTypes/update', [UserTypesController::class, 'update']);
    Route::post('/UserTypes/delete', [UserTypesController::class, 'delete']);
});

Route::get('/', function () {});



