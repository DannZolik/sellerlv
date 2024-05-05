<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function(){
    Route::get('/adverts', function () {
    });
    Route::get('/adverts/{advertID}', function () {
    });
    Route::post('/adverts/create', function () {
    });
    Route::post('/adverts/update', function () {
    });
    Route::post('/adverts/delete', function () {
    });

    Route::get('/advertCategories', function () {
    });
    Route::get('/advertCategories/{advertCategoryID}', function () {
    });
    Route::post('/advertCategories/create', function () {
    });
    Route::post('/advertCategories/update', function () {
    });
    Route::post('/advertCategories/delete', function () {
    });

    Route::get('/PaidAdvert', function () {
    });
    Route::get('/PaidAdvert/{PaidAdvertID}', function () {
    });
    Route::post('/PaidAdvert/create', function () {
    });
    Route::post('/PaidAdvert/update', function () {
    });
    Route::post('/PaidAdvert/delete', function () {
    });

    Route::get('/UserData', function () {
    });
    Route::get('/UserData/{UserDataID}', function () {
    });
    Route::post('/UserData/create', function () {
    });
    Route::post('/UserData/update', function () {
    });
    Route::post('/UserData/delete', function () {
    });

    Route::get('/UserDataType', function () {
    });
    Route::get('/UserDataType/{UserDataTypeID}', function () {
    });
    Route::post('/UserDataType/create', function () {
    });
    Route::post('/UserDataType/update', function () {
    });
    Route::post('/UserDataType/delete', function () {
    });

    Route::get('/UserTypes', function () {
    });
    Route::get('/UserTypes/{UserTypeID}', function () {
    });
    Route::post('/UserTypes/create', function () {
    });
    Route::post('/UserTypes/update', function () {
    });
    Route::post('/UserTypes/delete', function () {
    });
});

Route::get('/', function () {});



