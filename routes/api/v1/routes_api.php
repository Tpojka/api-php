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

Route::get('/', function () {
    return ['version' => 'v1'];
});

/**
 * Auth routes [/register, /login, /logout]
 * These routes are prefixed with /auth/
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('login', 'LoginController');
    Route::post('register', 'RegisterController');
    /**
     * Visitor has to be authenticated to access this route.
     */
    Route::post('logout', 'LogoutController')->middleware('auth');
});

/**
 * Authenticated routes
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('profiles', 'Profile\IndexController');
});
