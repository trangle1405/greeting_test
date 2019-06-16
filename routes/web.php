<?php

Route::group(['prefix' => 'book'], function () {
    Route::get('/','BookController@list')->name('book.list');
    Route::get('/create','BookController@create')->name('book.create');
    Route::post('/create','BookController@store')->name('book.store');
    Route::get('/{id}/show','BookController@show')->name('book.show');
    Route::get('/{id}/edit','BookController@edit')->name('book.edit');
    Route::post('/{id}/edit','BookController@update')->name('book.update');
    Route::get('/{id}/destroy','BookController@destroy')->name('book.destroy');
    Route::get('/search','BookController@search')->name('book.search');
});