<?php

Route::get('/','DishesController@index')->name('index');
Route::get('/new','DishesController@new')->name('new');
Route::post('/create','DishesController@create')->name('create');
Route::get('{id}/edit','DishesController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','DishesController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','DishesController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/delete','DishesController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','DishesController@view')->where(['id' => '[0-9]+'])->name('view');
Route::post('{id}/add-amount','DishesController@addAmount')->where(['id' => '[0-9]+'])->name('add-amount');
Route::post('{id}/edit-price','DishesController@editPrice')->where(['id' => '[0-9]+'])->name('edit-price');
?>
