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

// Route::get('/', function () {
    // return view('welcome');
    // return view('layouts.frontend.master.master');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'DashboardController@index')->name('dashboard');
	
	# Menu
	Route::resource('menus', 'MenuController');
	Route::patch('menus/update/{id}', 'MenuController@update')->name('menus.update.fix');

	# Role
	Route::resource('roles', 'RoleController');
	Route::patch('roles/update/{id}', 'RoleController@update')->name('roles.update.fix');
	# GroupRole
	Route::get('/roles/grupmenu/{id}', ['as' => 'grupmenu.index', 'uses' => 'RoleController@groupmenu']);
	Route::post('/role/updategrupmenu/{id}', ['as' => 'role.updategrupmenu', 'uses' => 'RoleController@update_groupmenu']);

	# User
	Route::resource('users', 'UserController');
	Route::patch('users/update/{id}', 'UserController@update')->name('users.update.fix');

	# General Aplication
	Route::resource('setting-application', 'GeneralApplicationController');

	# CONTENT

	# - Header
	Route::resource('header', 'content\HeaderController');
	# - PortoFolio
	Route::resource('portofolio', 'content\PortofolioController');
	# - PortoFolio Detail
	Route::resource('portofolio-detail', 'content\PortofolioDetailController');
	Route::patch('portofolio-detail/update/{id}', 'content\PortofolioDetailController@update')->name('portofolio-detail.update.fix');
	# - Service
	Route::resource('services', 'content\ServiceController');
	# - Service Detail
	Route::resource('service-detail', 'content\ServiceDetailController');
	Route::patch('service-detail/update/{id}', 'content\ServiceDetailController@update')->name('service-detail.update.fix');
	# - Working
	Route::resource('working', 'content\WorkingController');
	# - Working Detail
	Route::resource('working-detail', 'content\WorkingDetailController');
	Route::patch('working-detail/update/{id}', 'content\WorkingDetailController@update')->name('working-detail.update.fix');
	# - Working
	Route::resource('shop', 'content\ShopController');
	# - Artikel
	Route::resource('artikel', 'content\ArtikelController');
	# - Slider
	Route::resource('slider', 'content\SliderController');
	Route::patch('slider/update/{id}', 'content\SliderController@update')->name('slider.update.fix');
	# - Client
	Route::resource('client', 'content\ClientController');
	Route::patch('client/update/{id}', 'content\ClientController@update')->name('client.update.fix');

	# GUDANG

	# - Product
	Route::resource('product', 'gudang\ProductController');
	Route::patch('product/update/{id}', 'gudang\ProductController@update')->name('product.update.fix');
	Route::get('product-image/{id}', 'gudang\ProductController@getPicture')->name('product-image.getpicture');
	Route::post('product-image', 'gudang\ProductController@newPicture')->name('product-image.createpicture');
	Route::patch('product-image/{id}', 'gudang\ProductController@updatePicture')->name('product-image.updatepicture');
	Route::post('product-image/delete/{id}', 'gudang\ProductController@deletePicture')->name('product-image.deletepicture');

	# - Jenis Product
	Route::resource('jenis-product', 'gudang\JenisProductController');
	Route::patch('jenis-product/update/{id}', 'gudang\JenisProductController@update')->name('jenis-product.update.fix');

});