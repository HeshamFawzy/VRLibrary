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

		Route::get('/editport/{id}', 'BasicAdminController@editport')->name('basicadmin.editport');

		Route::post('/updateport/{id}', 'BasicAdminController@updateport')->name('basicadmin.updateport');

		Route::get('/admins', 'BasicAdminController@admins')->name('basicadmin.admins');

		Route::post('/store', 'BasicAdminController@store')->name('basicadmin.store');

		Route::get('/destroy/{id}', 'BasicAdminController@destroy')->name('basicadmin.destroy');

		Route::get('/edit/{id}', 'BasicAdminController@edit')->name('basicadmin.edit');

		Route::post('/update/{id}', 'BasicAdminController@update')->name('basicadmin.update');

		Route::get('/members', 'BasicAdminController@members')->name('basicadmin.members');

		Route::get('/destroyM/{id}', 'BasicAdminController@destroyM')->name('basicadmin.destroyM');

		Route::get('/editM/{id}', 'BasicAdminController@editM')->name('basicadmin.editM');

		Route::post('/updateM/{id}', 'BasicAdminController@updateM')->name('basicadmin.updateM');

});

Route::group(["middleware" => ["auth","admin"]], function(){

	Route::get('/Adminindex', 'AdminController@index')->name('admin.index');

	Route::get('/editportfolio/{id}', 'AdminController@editportfolio')->name('admin.editportfolio');

	Route::post('/updateportfolio/{id}', 'AdminController@updateportfolio')->name('admin.updateportfolio');

	Route::post('/storeadmin', 'AdminController@storeadmin')->name('admin.storeadmin');

	Route::post('/search', 'AdminController@search')->name('admin.search');

});

Route::group(["middleware" => ["auth","comman"]], function(){
		
		Route::get('/employees', 'BasicAdminController@employees')->name('basicadmin.employees');

		Route::get('/destroyE/{id}', 'BasicAdminController@destroyE')->name('basicadmin.destroyE');

		Route::get('/editE/{id}', 'BasicAdminController@editE')->name('basicadmin.editE');

		Route::post('/updateE/{id}', 'BasicAdminController@updateE')->name('basicadmin.updateE');
});

Route::group(["middleware" => ["auth","comman2"]], function(){

		Route::get('/members', 'BasicAdminController@members')->name('basicadmin.members');

		Route::get('/destroyM/{id}', 'BasicAdminController@destroyM')->name('basicadmin.destroyM');

		Route::get('/editM/{id}', 'BasicAdminController@editM')->name('basicadmin.editM');

		Route::post('/updateM/{id}', 'BasicAdminController@updateM')->name('basicadmin.updateM');

		Route::post('/search', 'EmployeeController@search')->name('employee.search');

		Route::get('/books', 'AdminController@books')->name('admin.books');

		Route::get('/destroyB/{id}', 'AdminController@destroyB')->name('admin.destroyB');

		Route::get('/editB/{id}', 'AdminController@editB')->name('admin.editB');

		Route::post('/updateB/{id}', 'AdminController@updateB')->name('admin.updateB');

});






Route::group(["middleware" => ["auth","employee"]], function(){

	Route::get('/Employeeindex', 'EmployeeController@index')->name('employee.index');

	Route::get('/editprofile/{id}', 'EmployeeController@editprofile')->name('employee.editprofile');

	Route::post('/updateprofile/{id}', 'EmployeeController@updateprofile')->name('employee.updateprofile');

	Route::post('/auth', 'EmployeeController@auth')->name('employee.auth');

	Route::post('/unauth', 'EmployeeController@unauth')->name('employee.unauth');

	Route::post('/publisher', 'EmployeeController@publisher')->name('employee.publisher');

	Route::post('/author', 'EmployeeController@author')->name('employee.author');

	Route::post('/title', 'EmployeeController@title')->name('employee.title');

});


Route::get('ajax', function(){ return view('ajax'); });