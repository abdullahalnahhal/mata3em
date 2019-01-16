<?php

Route::get('/','ClientsController@index')->name('index');
Route::get('/new','ClientsController@new')->name('new');
Route::post('/create/{order?}','ClientsController@create')->where(['order' => '0|1'])->name('create');
Route::get('{id}/edit','ClientsController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','ClientsController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','ClientsController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/delete','ClientsController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','ClientsController@view')->where(['id' => '[0-9]+'])->name('view');
Route::get('{id}/make-order','ClientsController@makeOrder')->where(['id' => '[0-9]+'])->name('make-order');
Route::get('{id}/make-order','ClientsController@makeOrder')->where(['id' => '[0-9]+'])->name('make-order');
Route::post('{id}/make-order','ClientsController@createOrder')->where(['id' => '[0-9]+'])->name('create-order');
Route::post('search','ClientsController@search')->where(['id' => '[0-9]+'])->name('search');
Route::get('{id}/edit-order','ClientsController@editOrder')->where(['id' => '[0-9]+'])->name('edit-order');

?>
