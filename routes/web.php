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
App::setLocale('ar');
Route::middleware(['web', 'auth'])->get('/', 'HomeController@index')->name('index');
Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@loginSubmit')->name('login.submit');
Route::get('/logout', 'UsersController@logout')->name('logout');
