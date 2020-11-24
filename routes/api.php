<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReferencesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Api Auth
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

// Usuarios
Route::get('users', [UserController::class, 'index']);

// Contactos
Route::get('contacts',[ContactController::class,'index']);
Route::get('contacts/{id}',[ContactController::class,'show']);
Route::post('contacts',[ContactController::class,'save']);
Route::post('contacts/{id}',[ContactController::class,'delete']);
Route::get('contacts',[ContactController::class,'index']);

// Referencias
Route::get('references',[ReferencesController::class,'index']);
Route::get('references/{id}',[ReferencesController::class,'show']);
Route::post('references',[ReferencesController::class,'save']);
Route::post('references/{id}',[ReferencesController::class,'delete']);
Route::get('references',[ReferencesController::class,'index']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
