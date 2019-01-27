<?php

Route::get('/','AccountsController@index')->name('index');
Route::get('/print','AccountsController@print')->name('print');
Route::get('/by-duration','AccountsController@byDuration')->name('by-duration');
Route::post('/by-duration','AccountsController@search')->name('search');

?>
