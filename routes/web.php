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
});

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('admin/login', 'Auth\LoginController@login')->name('login.store');
Route::get('admin/logout', 'Auth\LogoutController@logout')->name('logout');
Route::get('admin/register', 'Auth\RegisterController@showForm')->name('register.form');
Route::post('admin/register', 'Auth\RegisterController@register')->name('register.store');

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');

    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
       Route::get('/{id}/image', 'ProductController@showImages')->name('backend.product.image');
    });
    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::get('/{id}/product', 'UserController@showProducts')->name('backend.user.product');
    });
    //Quản lý danh mục
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.categorie.index');
        Route::get('/{id}/product', 'CategoryController@showProducts')->name('backend.categorie.product');
    });
    //Quản lý đơn hàng
    Route::group(['prefix' => 'orders'], function(){
        Route::get('/{id}/product', 'OrderController@showProducts')->name('backend.order.product');
    });
});

Route::group([
    'namespace' => 'Frontend',
    'prefix' => 'home'
], function (){
    Route::get('/home', 'HomeController@index')->name('backend.home');
});
