<?php

Route::get('/','AccountsController@periodic')->name('index');
Route::get('/new','AccountsController@periodic_new')->name('new');
Route::post('/create/{order?}','AccountsController@periodic_create')->where(['order' => '0|1'])->name('create');
Route::get('{id}/edit','AccountsController@periodic_edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','AccountsController@periodic_update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','AccountsController@periodic_delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','AccountsController@periodic_view')->where(['id' => '[0-9]+'])->name('view');

?>
