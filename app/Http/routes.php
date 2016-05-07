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

    Route::get('/send-mail', function(){
        Mail::raw('Text to e-mail', function ($message) {
            $message->to('ahmadrizalafani@gmail.com', 'Rizal Afani');
            $message->subject('Hello World!');
        });
    });

    Route::get('/login', 'Auth\MemberAuthController@getLogin');
    Route::post('/login', 'Auth\MemberAuthController@postLogin');
    Route::get('/register', 'Auth\MemberAuthController@getRegister');
    Route::post('/register', 'Auth\MemberAuthController@postRegister');
    Route::get('/logout', 'Auth\MemberAuthController@logout');

    Route::get('/cek-login', function(){
        if( auth('web')->check() ){
            return "Login User";
        }elseif( auth('member')->check() ){
            return "Login Member";
        }else{
            return "Belum login";
        }
    });

    Route::group(['prefix' => 'backend'], function(){
        // Login
        Route::get('/login', 'Auth\AuthController@getLogin');
        Route::post('/login', 'Auth\AuthController@postLogin');
        Route::get('/logout', 'Auth\AuthController@logout');

        Route::group(['middleware' => 'auth:web', 'namespace' => 'Admin'], function(){
            // Dashboard
            Route::get('/', 'DashboardController@index');
            Route::get('/dashboard', 'DashboardController@index');

            // Business
            Route::get('/business', 'BusinessController@index');
            Route::get('/business/map', 'BusinessController@map');
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
            Route::get('/product/add', 'ProductController@create');
            Route::post('/product/add', 'ProductController@store');
            Route::get('/product/{id}/edit', 'ProductController@edit');
            Route::post('/product/{id}/edit', 'ProductController@update');
            Route::get('/product/{id}/delete', 'ProductController@destroy');

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
            Route::get('/user/{id}/edit', 'UserController@edit');
            Route::post('/user/{id}/edit', 'UserController@update');
            Route::get('/user/{id}/delete', 'UserController@destroy');
            Route::get('/user/{id}/reset-password', 'UserController@resetPassword');

            // Account
            Route::get('/change-account', 'UserController@account');
            Route::post('/save-profile', 'UserController@saveProfile');
            Route::post('/save-password', 'UserController@savePassword');

            // Permission
            Route::get('/permission', 'PermissionController@index');
            Route::get('/permission/add', 'PermissionController@create');
            Route::post('/permission/add', 'PermissionController@store');
            Route::get('/permission/{id}/edit', 'PermissionController@edit');
            Route::post('/permission/{id}/edit', 'PermissionController@update');
            Route::get('/permission/{id}/delete', 'PermissionController@destroy');

            // Role
            Route::get('/role', 'RoleController@index');
            Route::get('/role/add', 'RoleController@create');
            Route::post('/role/add', 'RoleController@store');
            Route::get('/role/{id}/edit', 'RoleController@edit');
            Route::post('/role/{id}/edit', 'RoleController@update');
            Route::get('/role/{id}/delete', 'RoleController@destroy');
        });
    });

    // has login routes
    Route::get('/home', 'HomeController@index');
});
