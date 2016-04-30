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

Route::get('/', function () {
    return view('welcome');
});

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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::group(['prefix' => 'backend'], function(){
        // Business
        Route::get('/business', 'BusinessController@index');
        Route::get('/business/add', 'BusinessController@create');
        Route::post('/business/add', 'BusinessController@store');
        Route::get('/business/{id}/edit', 'BusinessController@edit');
        Route::post('/business/{id}/edit', 'BusinessController@update');
        Route::get('/business/{id}/delete', 'BusinessController@destroy');

        // Business Category
        Route::get('/business/category', 'CategoryController@index');
        Route::get('/business/category/add', 'CategoryController@create');
        Route::post('/business/category/add', 'CategoryController@store');
        Route::get('/business/category/{id}/edit', 'CategoryController@edit');
        Route::post('/business/category/{id}/edit', 'CategoryController@update');
        Route::get('/business/category/{id}/delete', 'CategoryController@destroy');

        // Business Products or service
        Route::get('/product', 'ProductController@index');

        // Product category
        Route::get('/product/category', 'ProductCategoryController@index');
        Route::get('/product/category/add', 'ProductCategoryController@create');
        Route::post('/product/category/add', 'ProductCategoryController@store');
        Route::get('/product/category/{id}/edit', 'ProductCategoryController@edit');
        Route::post('/product/category/{id}/edit', 'ProductCategoryController@update');
        Route::get('/product/category/{id}/delete', 'ProductCategoryController@destroy');

        // User Application
        Route::get('/user', 'UserController@index');
        Route::get('/user/add', 'UserController@create');
        Route::post('/user/add', 'UserController@store');
        Route::get('/user/{id}/delete', 'UserController@destroy');
    });

    // has login routes
    Route::get('/home', 'HomeController@index');
});
