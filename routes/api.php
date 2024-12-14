<?php

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

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', \App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', \App\Http\Controllers\Api\LogoutController::class)->name('logout');

/**
 * route "/voltage"
 * @method "POST"
 */
Route::post('/voltage', '\App\Http\Controllers\Api\VoltageController@store');

/**
 * route "/voltage"
 * @method "GET"
 */
Route::get('/voltage', '\App\Http\Controllers\Api\VoltageController@index');

/**
 * route "/voltage/{id}"
 * @method "GET"
 */
Route::get('/voltage/{id?}', '\App\Http\Controllers\Api\VoltageController@show');

/**
 * route "/voltage/update}"
 * @method "POST"
 */
Route::post('/voltage/update', '\App\Http\Controllers\Api\VoltageController@update');

/**
 * route "/voltage/{id}"
 * @method "DELETE"
 */
Route::delete('/voltage/{id?}', '\App\Http\Controllers\Api\VoltageController@destroy');

