<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OfferingController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('getUser', 'getUser');
    Route::post('upload', 'uploadImage');
});
Route::controller(OfferingController::class)->group(function () {
    Route::get('getCatagoryList', 'getCatagoryList');
    Route::get('getItemList/{catId}', 'getItemList');
    Route::post('saveOfferingList', 'saveOfferingList');
    Route::get('clean_cron', 'cleanData');
    Route::get('get-data', 'getData');
    Route::get('getPurohitList/{username}', 'getPurohitList');
    Route::get('getYajmaanList/{purohit}/{adtnlpurohit}/{location}', 'getYajmaanList');
});

