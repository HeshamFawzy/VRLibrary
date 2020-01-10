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

Route::get('/index', 'BasicAdminController@index')->name('basicadmin.index');

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
