<?php

Route::get('/','OrdersController@index')->name('index');
Route::post('/','OrdersController@filter')->name('filter');
Route::get('/new','OrdersController@new')->name('new');
Route::post('/create','OrdersController@create')->name('create');
Route::get('{id}/edit','OrdersController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','OrdersController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','OrdersController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/delete','OrdersController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','OrdersController@view')->where(['id' => '[0-9]+'])->name('view');
Route::get('{order_number}/search','OrdersController@search')->where(['id' => '[0-9]+'])->name('search');
Route::get('{id}/print','OrdersController@print')->where(['id' => '[0-9]+'])->name('print');
Route::get('{id}/cook','OrdersController@cook')->where(['id' => '[0-9]+'])->name('cook');
Route::get('{id}/deliver','OrdersController@deliver')->where(['id' => '[0-9]+'])->name('deliver');
Route::get('/delivered','OrdersController@delivered')->name('delivered');
Route::get('{id}/undeliver','OrdersController@undeliver')->where(['id' => '[0-9]+'])->name('undeliver');
Route::get('/kitchen','OrdersController@kitchen')->name('kitchen');
?>
