<?php

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

Route::get('/', 'ScreenController@screenFirst')->name('screen.first');
Route::get('/current', 'ScreenController@screenSecond')->name('screen.current');

Auth::routes();


/*
 * Admin Panel Routes & Auth
 */

Route::middleware(['admin'])->prefix('admin')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    // Uses first & second Middleware
    Route::get('/teams', 'TeamController@index')->name('teams.index');
    Route::get('/teams/create', 'TeamController@create')->name('teams.create');
    Route::post('/teams/create', 'TeamController@store')->name('teams.store');
    Route::get('/teams/{team}/edit', 'TeamController@edit')->name('teams.edit');
    Route::patch('/teams/{team}/edit', 'TeamController@update')->name('teams.update');
    Route::get('/teams/{voter}', 'TeamController@show')->name('teams.show');

    // Set Controller
    Route::resource('/sets', 'SetController');

    //Surveys Routes
    Route::resource('/question', 'QuestionController');
    Route::get('/questions/{set}', 'QuestionController@set')->name('question.set');
    Route::get('/questions-create/{set}', 'QuestionController@create')->name('question.set-create');
    Route::get('/question/{survey}/answers/create', 'QuestionController@AnswerCreate')->name('answer.index');
    Route::post('/answer', 'QuestionController@AnswerStore')->name('answer.store');
    Route::delete('/answer/{answer}', 'QuestionController@AnswerDelete')->name('answer.delete');

    Route::get('/screen/{type}', 'ScreenController@screen')->name('screen.index');

    Route::get('/reset-data', 'Api\StartController@resetData')->name('reset-data');
});
