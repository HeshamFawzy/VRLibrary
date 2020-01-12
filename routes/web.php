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
    return view('public.home');
});

Route::get('/aboutus', function () {
    return view('public.aboutus');
});

Route::get('/contactus', function () {
    return view('public.contactus');
});

Route::get('/loginR', function () {
    return view('auth.login');
});

Route::get('/registerR', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/start', 'BasicAdminController@start')->name('basicadmin.start');

Route::group(["middleware" => ["auth","basicadmin"]], function(){

		Route::get('/Basicindex', 'BasicAdminController@index')->name('basicadmin.index');

		Route::get('/editportfolio/{id}', 'BasicAdminController@editportfolio')->name('basicadmin.editportfolio');

		Route::post('/updateportfolio/{id}', 'BasicAdminController@updateportfolio')->name('basicadmin.updateportfolio');

		Route::get('/admins', 'BasicAdminController@admins')->name('basicadmin.admins');

		Route::post('/store', 'BasicAdminController@store')->name('basicadmin.store');

		Route::get('ajax', function(){ return view('ajax'); });

		Route::get('/destroy/{id}', 'BasicAdminController@destroy')->name('basicadmin.destroy');

		Route::get('/edit/{id}', 'BasicAdminController@edit')->name('basicadmin.edit');

		Route::post('/update/{id}', 'BasicAdminController@update')->name('basicadmin.update');

		Route::get('/employees', 'BasicAdminController@employees')->name('basicadmin.employees');

		Route::get('/destroyE/{id}', 'BasicAdminController@destroyE')->name('basicadmin.destroyE');

		Route::get('/editE/{id}', 'BasicAdminController@editE')->name('basicadmin.editE');

		Route::post('/updateE/{id}', 'BasicAdminController@updateE')->name('basicadmin.updateE');

		Route::get('/members', 'BasicAdminController@members')->name('basicadmin.members');

		Route::get('/destroyM/{id}', 'BasicAdminController@destroyM')->name('basicadmin.destroyM');

		Route::get('/editM/{id}', 'BasicAdminController@editM')->name('basicadmin.editM');

		Route::post('/updateM/{id}', 'BasicAdminController@updateM')->name('basicadmin.updateM');

});

Route::group(["middleware" => ["auth","admin"]], function(){

	Route::get('/Adminindex', 'AdminController@index')->name('admin.index');

	Route::get('/editprofile/{id}', 'AdminController@editprofile')->name('admin.editprofile');

	Route::post('/updateprofile/{id}', 'AdminController@updateprofile')->name('admin.updateprofile');

	Route::post('/storeadmin', 'AdminController@storeadmin')->name('admin.storeadmin');

	Route::get('ajax', function(){ return view('ajax'); });

	Route::get('/employees', 'BasicAdminController@employees')->name('basicadmin.employees');

	Route::get('/destroyE/{id}', 'BasicAdminController@destroyE')->name('basicadmin.destroyE');

	Route::get('/editE/{id}', 'BasicAdminController@editE')->name('basicadmin.editE');

	Route::post('/updateE/{id}', 'BasicAdminController@updateE')->name('basicadmin.updateE');

	Route::post('/search', 'AdminController@search')->name('admin.search');

	Route::get('/books', 'AdminController@books')->name('admin.books');

});