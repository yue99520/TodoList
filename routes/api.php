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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'auth:api',
    'except' => ['login', 'register'],
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'Api\JWTAuthController@register')->name('register');
    Route::post('login', 'Api\JWTAuthController@login')->name('login');
    Route::post('logout', 'Api\JWTAuthController@logout')->name('logout');
    Route::post('refresh', 'Api\JWTAuthController@refresh')->name('refresh_token');
});
