<?php
Route::get('/','UsersController@index')->name('index');
Route::get('/new','UsersController@new')->name('new');
Route::post('/create','UsersController@create')->name('create');
Route::get('{id}/edit','UsersController@edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','UsersController@update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','UsersController@delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','UsersController@view')->where(['id' => '[0-9]+'])->name('view');
?>
