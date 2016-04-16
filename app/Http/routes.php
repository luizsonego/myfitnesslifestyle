<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'trainers'], function() {
		Route::get('/','TrainerController@index')->name('admin-show-all-trainers');
		Route::get('/create','TrainerController@create')->name('admin-create-trainer');
		Route::post('/store','TrainerController@store')->name('admin-store-trainer');
		Route::get('/update','TrainerController@save')->name('admin-update-trainer');
	});
});


