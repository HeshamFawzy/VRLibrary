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

Route::get('/index', 'BasicAdminController@index')->name('basicadmin.index');