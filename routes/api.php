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


Route::group(['namespace' => 'Api'], function () {
    Route::get('/start', 'StartController@start')->name('start.push');
    Route::get('/team/{name}', 'StartController@team');
    Route::get('/sets/{set}', 'StartController@sets');
    Route::get('/questions/{question}', 'StartController@questions');
    Route::post('/answers', 'StartController@answers');
});
