<?php

Route::get('/','DishesUnitsController@index')->name('index');
Route::get('/new','DishesUnitsController@new')->name('new');
Route::post('/create','DishesUnitsController@create')->name('create');
Route::get('{id}/edit','DishesUnitsController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','DishesUnitsController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','DishesUnitsController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/delete','DishesUnitsController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','DishesUnitsController@view')->where(['id' => '[0-9]+'])->name('view');
?>
