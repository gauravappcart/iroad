<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\Home_controller;
use App\Http\Controllers\admin\Login_controller;
use App\Http\Controllers\admin\Dashboard_controller;



Route::get('/', [Home_controller::class, 'index']);

Route::group(['middleware' => 'valid:manager,data'], function () {  
    Route::group(['prefix' => 'manager/'], function () {
        Route::get('/', [Login_controller::class, 'index'])->name('login');       
    });
});


Route::group(['middleware' => 'invalid:manager,data'], function () {  
    Route::group(['prefix' => 'manager/'], function () {          

    Route::get('logout', [Dashboard_controller::class, 'logout']); 

    });
});