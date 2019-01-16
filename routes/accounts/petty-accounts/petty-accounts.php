<?php

Route::get('/','AccountsController@petty')->name('index');
Route::get('/new','AccountsController@petty_new')->name('new');
Route::post('/create/{order?}','AccountsController@petty_create')->where(['order' => '0|1'])->name('create');
Route::get('{id}/edit','AccountsController@petty_edit')->where(['id' => '[0-9]+'])->name('edit');
Route::post('{id}/update','AccountsController@petty_update')->where(['id' => '[0-9]+'])->name('update');
Route::get('{id}/delete','AccountsController@petty_delete')->where(['id' => '[0-9]+'])->name('delete');
Route::get('{id}/view','AccountsController@petty_view')->where(['id' => '[0-9]+'])->name('view');

?>
