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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*|----------------------------------------------------------------------------------------------|
  |------------------------------------ADMIN ROUTING---------------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
  Route::namespace('Admin')->group(function () {
	Route::resource('admin-login','AdminController');
	Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
		Route::get('home','AdminController@home')->name('admin_home');
		Route::get('logout','AdminController@logout')->name('admin_logout');
		//contact us
		Route::get('contact-list','SettingController@contact_list')->name('contact_list');
		//country
		Route::get('country','SettingController@country')->name('country_index');
		Route::post('country-store','SettingController@country_store')->name('country_store');
		Route::get('country-edit/{id}','SettingController@country_edit')->name('country_edit');
		Route::post('country-update/{id}','SettingController@country_update')->name('country_update');
		Route::get('country-del/{id}','SettingController@country_del')->name('country_del');
		// country end
		//state 
		Route::get('state','SettingController@state')->name('state_index');
		Route::post('state-store','SettingController@state_store')->name('state_store');
		Route::get('state-edit/{id}','SettingController@state_edit')->name('state_edit');
		Route::post('state-update/{id}','SettingController@state_update')->name('state_update');
		Route::get('state-del/{id}','SettingController@state_del')->name('state_del');
		//state end
		//city
		Route::get('city','SettingController@city')->name('city_index');
		Route::post('city-store','SettingController@city_store')->name('city_store');
		Route::get('city-edit/{id}','SettingController@city_edit')->name('city_edit');
		Route::post('city-update/{id}','SettingController@city_update')->name('city_update');
		Route::get('city-del/{id}','SettingController@city_del')->name('city_del');
		//city end
		//mediatype
		Route::get('category','SettingController@cat')->name('cattype_index');
		Route::post('cat-type-store','SettingController@cattype_store')->name('cat_store');
		Route::get('category-edit/{id}','SettingController@cattype_edit')->name('cat_edit');
		Route::post('cat-type-update/{id}','SettingController@cattype_update')->name('cat_update');
		Route::get('cat-type-del/{id}','SettingController@cattype_del')->name('cat_del');
		//mediatype end
    });
  });
