<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('HomePage', 'HomePageController@index')->name('HomePage.index');

Route::post('LoremIpsumGenerator/generate', 'LoremIpsumGeneratorController@generate')->name('LoremIpsumGenerator.generate');

Route::get('LoremIpsumGenerator', 'LoremIpsumGeneratorController@index')->name('LoremIpsumGenerator.index');

Route::post('RandomUserGenerator/generate', 'RandomUserGeneratorController@generate')->name('RandomUserGenerator.generate');

Route::get('RandomUserGenerator', 'RandomUserGeneratorController@index')->name('RandomUserGenerator.index');

Route::post('PasswordGenerator/generate', 'PasswordGeneratorController@generate')->name('PasswordGenerator.generate');

Route::get('PasswordGenerator', 'PasswordGeneratorController@index')->name('PasswordGenerator.index');