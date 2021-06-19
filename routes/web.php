<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('admin/login', 'Auth\LoginController@login')->name('login.store');
Route::get('admin/logout', 'Auth\LogoutController@logout')->name('logout');
Route::get('admin/register', 'Auth\RegisterController@showForm')->name('register.form');
Route::post('admin/register', 'Auth\RegisterController@register')->name('register.store');

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
     'middleware' => ['auth', 'check_admin'],
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');

    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('backend.product.index');
        Route::get('/create', 'ProductController@create')->name('backend.product.create');
        Route::post('/', 'ProductController@store')->name('backend.product.store');
        Route::get('/edit/{product}', 'ProductController@edit')->name('backend.product.edit')
         ->middleware('can:update,product');
        Route::post('/{product}', 'ProductController@update')->name('backend.product.update')
         ->middleware('can:update,product');

        Route::get('/{id}/image', 'ProductController@showImages')->name('backend.product.image');
    });
    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::get('/edit/{user}', 'UserController@edit')->name('backend.user.edit')
            ->middleware('can:update,user');
        Route::post('/{user}', 'UserController@update')->name('backend.user.update')
            ->middleware('can:update,user');

        Route::get('/{id}/product', 'UserController@showProducts')->name('backend.user.product');
    });
    //Quản lý danh mục
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/', 'CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{category}', 'CategoryController@edit')->name('backend.category.edit')
            ->middleware('can:update,category');
        Route::post('/{category}', 'CategoryController@update')->name('backend.category.update')
            ->middleware('can:update,category');

        Route::get('/{id}/product', 'CategoryController@showProducts')->name('backend.category.product');
    });
    //Quản lý đơn hàng
    Route::group(['prefix' => 'orders'], function(){
        Route::get('/{id}/product', 'OrderController@showProducts')->name('backend.order.product');
    });
});

Route::group([
    'namespace' => 'Frontend',
    'prefix' => 'user'
], function (){
    Route::get('/home', 'HomeController@index')->name('frontend.home');
});
