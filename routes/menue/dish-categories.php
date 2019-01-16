<?php

Route::get('/','DishCategoriesController@index')->name('index');
Route::get('/new','DishCategoriesController@new')->name('new');
Route::post('/create','DishCategoriesController@create')->name('create');
Route::get('{id}/edit','DishCategoriesController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','DishCategoriesController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','DishCategoriesController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/delete','DishCategoriesController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','DishCategoriesController@view')->where(['id' => '[0-9]+'])->name('view');
?>
