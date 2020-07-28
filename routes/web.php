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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employee/index', 'AdminController@index')->middleware('auth');

Route::get('/employee/create', 'AdminController@create')->middleware('auth');

Route::post('/employee/store', 'AdminController@store')->middleware('auth');

Route::get('/employee/show/{id}', 'AdminController@show')->middleware('auth');

Route::get('/employee/edit/{id}', 'AdminController@edit')->middleware('auth');

Route::patch('/employee/update/{id}', 'AdminController@update')->middleware('auth');

Route::delete('/employee/delete/{id}', 'AdminController@destroy')->middleware('auth');


