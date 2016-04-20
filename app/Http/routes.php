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
		Route::post('/update','TrainerController@update')->name('admin-update-trainer');
		Route::get('/edit/{id}','TrainerController@edit')->name('admin-edit-trainer');
	});
        Route::group(['prefix' => 'categories'], function() {
                Route::get('/','CategoryController@index')->name('admin-show-all-category');
                Route::get('/create','CategoryController@create')->name('admin-create-category');
                Route::post('/store','CategoryController@store')->name('admin-store-category');
                Route::post('/update','CategoryController@update')->name('admin-update-category');
                Route::get('/edit/{id}','CategoryController@edit')->name('admin-edit-category');
        });

});


