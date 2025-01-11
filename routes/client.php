<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Backend\ServiceController;

use Illuminate\Support\Facades\Route;





Route::group([
 
    'prefix' => 'client'

], function ($router) { 
    Route::post('login', [ClientController::class,'login']);
    Route::post('signup', [ClientController::class,'signup']);
    Route::post('logout', [ClientController::class,'logout']);
    Route::post('otpCheck',[ClientController::class,'otpCheck']);

});

Route::group(
    [
        //'middleware' => ['auth.api'],
   // 'middleware' => 'auth:client-api',
    'prefix' => 'client'

], function ($router) {
    

    Route::post('test', [ClientController::class,'test']);
    Route::post('getServices',[ClientController::class,'getServices']);
    Route::get('vehicletype/{locale}',[ClientController::class,'vehicletype']);
    

});
