<?php

use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::controller(ClientController::class)->group(function(){
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });
        
// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('products', ProductController::class);
// });

// Route::group([

//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {
    
//     Route::post('login', [ClientController::class,'login']);
//     Route::post('signup', [ClientController::class,'signup'])->name('signup');
//     Route::post('logout', [ClientController::class,'logout']);
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

// });