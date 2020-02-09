<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController')->middleware('auth:api');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::put('profiles/update-profile', 'Profile\IndexController@updateProfile');
    Route::resource('profiles', 'Profile\IndexController');
});

Route::get('dashboard', 'DashboardController@index')->middleware('auth:api');
