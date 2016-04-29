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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('cms/login','CmsController@login')->name('admin-login');

Route::group(['prefix' => 'admin'], function() {
	Route::get('/','AdminController@index')->name('admin-dashboard');
	Route::group(['prefix' => 'trainers'], function() {
		Route::get('/','TrainerController@index')->name('admin-show-all-trainers');
		Route::get('/create','TrainerController@create')->name('admin-create-trainer');
		Route::post('/store','TrainerController@store')->name('admin-store-trainer');
		Route::post('/update','TrainerController@update')->name('admin-update-trainer');
		Route::get('/edit/{id}','TrainerController@edit')->name('admin-edit-trainer');
		Route::get('/delete/{id}','TrainerController@destroy')->name('admin-delete-trainer');
	});
        Route::group(['prefix' => 'categories'], function() {
                Route::get('/','CategoryController@index')->name('admin-show-all-categories');
                Route::get('/create','CategoryController@create')->name('admin-create-category');
                Route::post('/store','CategoryController@store')->name('admin-store-category');
                Route::post('/update','CategoryController@update')->name('admin-update-category');
                Route::get('/edit/{id}','CategoryController@edit')->name('admin-edit-category');
		Route::get('/delete/{id}','CategoryController@destroy')->name('admin-delete-category');
        });
	Route::group(['prefix' => 'authors'], function() {
                Route::get('/','AuthorController@index')->name('admin-show-all-authors');
                Route::get('/create','AuthorController@create')->name('admin-create-author');
                Route::post('/store','AuthorController@store')->name('admin-store-author');
                Route::post('/update','AuthorController@update')->name('admin-update-author');
                Route::get('/edit/{id}','AuthorController@edit')->name('admin-edit-author');
                Route::get('/delete/{id}','AuthorController@destroy')->name('admin-delete-author');
        });
	Route::group(['prefix' => 'articles'], function() {
                Route::get('/','ArticleController@index')->name('admin-show-all-articles');
                Route::get('/create','ArticleController@create')->name('admin-create-article');
                Route::post('/store','ArticleController@store')->name('admin-store-article');
                Route::post('/update','ArticleController@update')->name('admin-update-article');
                Route::get('/edit/{id}','ArticleController@edit')->name('admin-edit-article');
                Route::get('/delete/{id}','ArticleController@destroy')->name('admin-delete-article');
		Route::post('/images','ArticleController@addImages')->name('admin-add-article-images');
		Route::get('/delete/{id}/image/{img}','ArticleController@destroyImage')->name('admin-delete-article-image');
        });
        Route::group(['prefix' => 'achievements'], function() {
                Route::get('/','AchievementController@index')->name('admin-show-all-achievements');
                Route::get('/create','AchievementController@create')->name('admin-create-achievement');
                Route::post('/store','AchievementController@store')->name('admin-store-achievement');
                Route::post('/update','AchievementController@update')->name('admin-update-achievement');
                Route::get('/edit/{id}','AchievementController@edit')->name('admin-edit-achievement');
                Route::get('/delete/{id}','AchievementController@destroy')->name('admin-delete-achievement');
		Route::post('/images','AchievementController@addImages')->name('admin-add-achievement-images');
                Route::get('/delete/{id}/image/{img}','AchievementController@destroyImage')->name('admin-delete-achievement-image');
        });

});


