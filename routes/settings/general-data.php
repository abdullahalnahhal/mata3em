<?php
Route::get('/','SettingsController@index')->name('index');
Route::post('/new','SettingsController@generalDataUpdate')->name('new');
// Route::post('/create','SettingsController@create')->name('create');
// Route::get('{id}/edit','SettingsController@edit')->where(['id' => '[0-9]+'])->name('edit');
// Route::post('{id}/update','SettingsController@update')->where(['id' => '[0-9]+'])->name('update');
// Route::get('{id}/delete','SettingsController@delete')->where(['id' => '[0-9]+'])->name('delete');
// Route::get('{id}/delete','SettingsController@delete')->where(['id' => '[0-9]+'])->name('delete');
// Route::get('{id}/view','SettingsController@view')->where(['id' => '[0-9]+'])->name('view');
?>
