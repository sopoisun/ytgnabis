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

Route::get('/test', function(){
    $kecamatans = [
        ['kecamatan' => 'Banyuwangi'],
        ['kecamatan' => 'Rogojampi'],
        ['kecamatan' => 'Genteng'],
        ['kecamatan' => 'Wongsorejo'],
        ['kecamatan' => 'Giri'],
        ['kecamatan' => 'Kalipuro'],
        ['kecamatan' => 'Glagah'],
        ['kecamatan' => 'Licin'],
        ['kecamatan' => 'Songgon'],
        ['kecamatan' => 'Sempu'],
        ['kecamatan' => 'Singojuruh'],
        ['kecamatan' => 'Kabat'],
        ['kecamatan' => 'Srono'],
        ['kecamatan' => 'Kalibaru'],
        ['kecamatan' => 'Glenmore'],
        ['kecamatan' => 'Tegalsari'],
        ['kecamatan' => 'Gambiran'],
        ['kecamatan' => 'Cluring'],
        ['kecamatan' => 'Muncar'],
        ['kecamatan' => 'Tegaldlimo'],
        ['kecamatan' => 'Purwoharjo'],
        ['kecamatan' => 'Bangorejo'],
        ['kecamatan' => 'Silirangung'],
        ['kecamatan' => 'Pesanggaran'],
    ];

    # Categories
    foreach( $kecamatans as $k ){
        $r = request()->create('/', 'GET', [
            'name' => $k['kecamatan'],
            'seo' => [
                'permalink' => strtolower($k['kecamatan']),
                'site_title' => $k['kecamatan'],
            ],
        ]);
        $kat = \App\Kecamatan::simpan($r);
    }
});

Route::get('/elasticsearch', function(){
    $data = \App\BusinessProduct::with(['seo', 'business.seo'])->where('active', 1)->get();

    $display = [];
    foreach( $data as $d ){
        $id = $d->id;
        $display[$id] = [
            'permalink'     => $d->seo->permalink,
            'name'          => $d->name,
            'price'         => $d->price,
            'seo_id'        => $d->seo_id,
            'business_id'   => $d->business_id,
            'business'      => [
                'id'        => $d->business_id,
                'permalink' => $d->seo->permalink,
                'name'      => $d->business->name,
                'address'   => $d->business->address,
                'location'  => [
                    'lat'   => $d->business->map_lat,
                    'lon'   => $d->business->map_long,
                ],
            ]
        ];
    }

    $docs = [];
    foreach ( $display as $key => $val ) {
        $doc = [
            'body'  => $val,
            'index' => 'sibangty',
            'type'  => 'product',
            'id'    => $key,
        ];

        $doc = Elasticsearch::index($doc);

        array_push($docs, $doc);
    }

    return $docs;
});

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

Route::group(['prefix' => 'api'], function(){
    Route::get('/kecamatans', 'Api\ApiController@kecamatans');
    Route::get('/business-categories', 'Api\ApiController@businessCategories');
    Route::get('/product-categories', 'Api\ApiController@productCategories');
    Route::get('/businesses', 'Api\ApiController@businesses');
    Route::get('/business', 'Api\ApiController@business');
    Route::get('/business_product', 'Api\ApiController@business_products');
    Route::get('/products', 'Api\ApiController@products');
    Route::get('/product', 'Api\ApiController@product');
    Route::get('/map', 'Api\ApiController@map');
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
        Route::get('/business/write-to-es', 'BusinessController@write_to_es');
        Route::get('/business/map', 'BusinessController@map');
        Route::get('/business/add', 'BusinessController@create');
        Route::post('/business/add', 'BusinessController@store');
        Route::get('/business/{id}/edit', 'BusinessController@edit');
        Route::post('/business/{id}/edit', 'BusinessController@update');
        Route::get('/business/{id}/delete', 'BusinessController@destroy');

        // Business Category
        Route::get('/business/category', 'CategoryController@index');
        Route::get('/business/category/write-to-es', 'CategoryController@write_to_es');
        Route::get('/business/category/add', 'CategoryController@create');
        Route::post('/business/category/add', 'CategoryController@store');
        Route::get('/business/category/{id}/edit', 'CategoryController@edit');
        Route::post('/business/category/{id}/edit', 'CategoryController@update');
        Route::get('/business/category/{id}/delete', 'CategoryController@destroy');

        // Business Products
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

        // Business Services
        Route::get('/service', 'ServiceController@index');
        Route::get('/service/add', 'ServiceController@create');
        Route::post('/service/add', 'ServiceController@store');
        Route::get('/service/{id}/edit', 'ServiceController@edit');
        Route::post('/service/{id}/edit', 'ServiceController@update');
        Route::get('/service/{id}/delete', 'ServiceController@destroy');

        // Tour
        Route::get('/tour', 'TourController@index');
        Route::get('/tour/write-to-es', 'TourController@write_to_es');
        Route::get('/tour/add', 'TourController@create');
        Route::post('/tour/add', 'TourController@store');
        Route::get('/tour/{id}/edit', 'TourController@edit');
        Route::post('/tour/{id}/edit', 'TourController@update');
        Route::get('/tour/{id}/delete', 'TourController@destroy');

        // Tour category
        Route::get('/tour/category', 'TourCategoryController@index');
        Route::get('/tour/category/write-to-es', 'TourCategoryController@write_to_es');
        Route::get('/tour/category/add', 'TourCategoryController@create');
        Route::post('/tour/category/add', 'TourCategoryController@store');
        Route::get('/tour/category/{id}/edit', 'TourCategoryController@edit');
        Route::post('/tour/category/{id}/edit', 'TourCategoryController@update');
        Route::get('/tour/category/{id}/delete', 'TourCategoryController@destroy');

        // Post
        Route::get('/post', 'PostController@index');
        Route::get('/post/add', 'PostController@create');
        Route::post('/post/add', 'PostController@store');
        Route::get('/post/{id}/edit', 'PostController@edit');
        Route::post('/post/{id}/edit', 'PostController@update');
        Route::get('/post/{id}/delete', 'PostController@destroy');

        // Post category
        Route::get('/post/category', 'PostCategoryController@index');
        Route::get('/post/category/add', 'PostCategoryController@create');
        Route::post('/post/category/add', 'PostCategoryController@store');
        Route::get('/post/category/{id}/edit', 'PostCategoryController@edit');
        Route::post('/post/category/{id}/edit', 'PostCategoryController@update');
        Route::get('/post/category/{id}/delete', 'PostCategoryController@destroy');

        // Page
        Route::get('/page', 'PageController@index');
        Route::get('/page/add', 'PageController@create');
        Route::post('/page/add', 'PageController@store');
        Route::get('/page/{id}/edit', 'PageController@edit');
        Route::post('/page/{id}/edit', 'PageController@update');
        Route::get('/page/{id}/delete', 'PageController@destroy');

        // Kecamatan
        Route::get('/kecamatan', 'KecamatanController@index');
        Route::get('/kecamatan/write-to-es', 'KecamatanController@write_to_es');
        Route::get('/kecamatan/add', 'KecamatanController@create');
        Route::post('/kecamatan/add', 'KecamatanController@store');
        Route::get('/kecamatan/{id}/edit', 'KecamatanController@edit');
        Route::post('/kecamatan/{id}/edit', 'KecamatanController@update');
        Route::get('/kecamatan/{id}/delete', 'KecamatanController@destroy');

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

        // Setting
        Route::get('/setting', 'SettingController@index');
        Route::post('/setting', 'SettingController@save');

        Route::group(['prefix' => 'ajax'], function(){
            Route::get('/kecamatan', 'KecamatanController@ajax');
        });
    });
});

// Map Page Actions
Route::group(['prefix' => 'ajax'], function(){
    Route::get('/load-map', 'Web\MapPageController@load');
    Route::get('/forget-map', 'Web\MapPageController@clear');
});


Route::get('{permalink?}', 'PermalinkController@index');
