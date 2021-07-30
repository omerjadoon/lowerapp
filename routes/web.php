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

Route::get('/', 'MainController@index')->name('main');
Route::post('save-contact','MainController@savecontact')->name('save_contact');

Route::view('privacy-policy','privacy_policy')->name('privacy_policy');
Route::view('about-us','aboutus')->name('aboutus');
Route::view('contact-us','contactus')->name('contactus');
Route::get('categories','MainController@allcate')->name('allcate');
Route::get('ads','MainController@allads')->name('allads');
Route::get('ads/{slug}','MainController@adsdesc')->name('adsdesc');

/*
|--------------------------------------------------------------------------
| AJAX REQUEST FOR COUNTRY CITY STATE
|--------------------------------------------------------------------------
*/
Route::get('get-state-by-countryid','MainController@getstatebycountryid')->name('get_state');
Route::get('get-city-by-stateid','MainController@getcitybystateid')->name('get_city');



Auth::routes(['verify' => true]);


Route::post('change-password','HomeController@change_passwordstore')->name('change_password_upd');

Route::get('/home', 'HomeController@index')->name('home');

/*|----------------------------------------------------------------------------------------------|
  |--------------------------------Seller USER ROUTING-----------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
  Route::group(['prefix' => 'seller','middleware'=> ['auth','verified','seller']],function(){
	Route::namespace('Seller')->group(function () {
	  	Route::resource('dashboard','SellerController');
		Route::get('account-setting','SellerController@account_setting')->name('account');
		Route::get('change-password','SellerController@change_password')->name('change_password');
		Route::resource('ads','AdController');
		Route::resource('leads','LeadController');
		Route::get('send-payment-bfa','LeadController@sendpaymenttobfa')->name('sendpaymenttobfa');
		Route::get('upload-ads','AdController@uploadadindex')->name('upload_ad');
		Route::get('ad-participants','AdController@ad_participants')->name('participants');
		Route::get('get-format','AdController@get_format')->name('get-format');
	});
  });

  /*|----------------------------------------------------------------------------------------------|
  |--------------------------------Buyer USER ROUTING-----------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
  Route::group(['prefix' => 'buyer','middleware'=> ['auth','verified','buyer']],function(){
	Route::namespace('Buyer')->group(function () {
	  	Route::resource('my-dashboard','BuyerController');
		Route::get('account-setting','BuyerController@account_setting')->name('b_account');
		Route::get('change-password','BuyerController@change_password')->name('b_change_password');
	});
  });

/*|----------------------------------------------------------------------------------------------|
  |------------------------------------ADMIN ROUTING---------------------------------------------|
  |----------------------------------------------------------------------------------------------|*/
  Route::namespace('Admin')->group(function () {
	Route::resource('admin-login','AdminController');
	Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
		Route::get('home','AdminController@home')->name('admin_home');
		Route::get('logout','AdminController@logout')->name('admin_logout');
		Route::get('change-password','AdminController@change_pass_admin')->name('change_pass_admin');
		Route::match(['PUT','PATCH'],'change-password','AdminController@update')->name('change_pass_admin_upd');
		Route::get('delete-user/{userid}','AdminController@del_user')->name('del_user');

		//Seller Controller 
		Route::resource('seller','SellerController');
		//ad controller
		Route::resource('ad','AdController');
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
