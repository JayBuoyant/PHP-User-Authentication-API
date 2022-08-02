<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});


Route::get('/createuser', function () {
    return view('createuser');
});

Route::get('/registeruser', function () {
    return view('registeruser');
});
Route::get('/users', [UserController::class, 'showAllUsers']);



// provide a findUserByID page for users who know the id of the user
Route::get('/find_known_user', function () {
    return view('edituser');
});
Route::post('/find_known_user',[UserController::class, 'findKnownUser']);


Route::get('/edit_user/{id}',[UserController::class, 'findKnownUser']);
Route::get('/edit_user',[UserController::class, 'findKnownUser']);


Route::post('/createuser',[UserController::class, 'createUser']);

//Route::get('/edituser',[UserController::class, 'editUser']);
Route::post('/edituser',[UserController::class, 'editUser']);

Route::get('/deleteuser/{id}',[UserController::class, 'deleteUser']);


