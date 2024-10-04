<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
    //route untuk register user
    Route::post('auth/register', \App\Http\controllers\Api\Auth\RegisterController::class);
     //Route untuk Login user
     Route::post('auth/login', \App\Http\Controllers\Api\Auth\LoginController::class);


     // Route yang hanya bisa diakses dengan token
     Route::middleware('auth:sanctum')->group (function () {
    //Route untuk Logout user
     Route::post('auth/logout', \App\Http\Controllers\Api\Auth\LogoutController::class);
     Route::resource('category', \App\Http\Controllers\Api\CategoriesController::class)->except('edit');
     Route::resource('product', \App\Http\Controllers\Api\ProductsController::class)->except('edit');
     });



});

