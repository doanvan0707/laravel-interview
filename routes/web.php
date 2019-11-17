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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.', 'middleware' => 'check-login-admin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('products', 'ProductController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('orders', 'OrderController');
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('show-login', 'LoginController@checkLogin')->name('check-login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function () {
    Route::get('login', 'LoginController@login')->name('login')->middleware('checked-login');
    Route::post('show-login', 'LoginController@checkLogin')->name('check-login');
});

Route::get('admin/logout', 'Backend\LoginController@logout')->name('admin.logout');


Route::group(['prefix' => '/', 'namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontEndController@index')->name('index');
    Route::get('/product-slug/{product}', 'FrontEndController@getDetailProduct' )->name('get-detail-product');
    Route::get('/cart/{product}', 'FrontEndController@addToCart' )->name('add-to-cart');
    Route::get('/cartv2', 'FrontEndController@showAllCart')->name('show-all-cart');
    Route::put('update-cart', 'FrontEndController@update');
    Route::delete('remove-from-cart', 'FrontEndController@remove');
    Route::post('checkout', 'FrontEndController@checkout')->name('checkout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
