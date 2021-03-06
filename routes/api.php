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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout')->middleware('auth:api');
Route::group(['prefix' => 'courses'], function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('', 'CoursesController@create');
        Route::get('', 'CoursesController@getAll');
        Route::post('user', 'CoursesController@registerUser');
    });
    Route::get('download', 'CoursesController@download');
});
