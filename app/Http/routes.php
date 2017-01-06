<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SerialController@getSerials');
Route::get('/serial/{slug}', 'SerialController@getSerialBySlug');
Route::get('/serial/epizod/{slug}', 'SerialController@getEpizodBySlug');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['admin']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/show/serial/', 'HomeController@showSerials');
    Route::get('/create/serial', 'HomeController@createSerial');
    Route::get('/update/serial/{slug}', 'HomeController@updateSerial');
    Route::get('/delete/serial/{slug}', 'HomeController@deleteSerial');
    Route::post('/post/create/', 'HomeController@store');

    Route::get('/create/season', 'SeasonController@createSeason');
    Route::post('/post/create/season', 'SeasonController@store');

    Route::get('/create/epizod', 'EpizodController@createEpizod');
    Route::post('/post/create/epizod', 'EpizodController@store');
    Route::get('/get/seasons', 'EpizodController@getSeasons');

    Route::get('/get/list/seasons', 'SeasonController@listSeasons');
    Route::get('/update/season/{slug}', 'SeasonController@updateSeason');
    Route::get('/delete/season/{slug}', 'SeasonController@deleteSeason');


    Route::get('/get/list/epizodes', 'EpizodController@listEpizodes');
    Route::get('/update/epizod/{slug}', 'EpizodController@updateEpizod');
    Route::get('/delete/epizod/{slug}', 'EpizodController@deleteEpizod');

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});
