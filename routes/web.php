<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/messages', 'HomeController@store')->name('messages.store');
Route::post('/response_message', 'HomeController@response_message')->name('response_message');

Route::get('messages/{id}', 'HomeController@show')->name('messages.show');
Route::get('messages/token/{token}', 'HomeController@veriftoken')->name('veriftoken');
