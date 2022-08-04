<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create',[UserController::class, 'register']);

Route::get('/users',[UserController::class, 'getusers']);


Route::get('/users/{id}',[UserController::class, 'getuser']);

Route::post('/update/{id}',[UserController::class, 'update']);
Route::post('/delete/{id}',[UserController::class, 'delete']);
Route::get('/delete/{id}',[UserController::class, 'delete']);



Route::middleware('api-session')->post('/user/login',[UserController::class, 'login']);


//Route::get('/users/login',[UserController::class, 'login']);

