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

/*Route::get('/subak', 'AdminController@index');*/

Route::resource('subak', 'SubakController');

Auth::routes();

Route::get('/subak', 'SubakController@index')->name('home');

Route::resource('dashboard', 'DashboardController');

Auth::routes();

Route::get('/home', 'dashboardController@index')->name('home');