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

Route::get('/', 'HomePageController@index')->name('HomePage.index');

Route::get('homepage', 'HomePageController@index')->name('HomePage.index');

Route::post('loremipsumgenerator/generate', 'LoremIpsumGeneratorController@generate')->name('LoremIpsumGenerator.generate');

Route::get('loremipsumgenerator', 'LoremIpsumGeneratorController@index')->name('LoremIpsumGenerator.index');

Route::post('randomusergenerator/generate', 'RandomUserGeneratorController@generate')->name('RandomUserGenerator.generate');

Route::get('randomusergenerator', 'RandomUserGeneratorController@index')->name('RandomUserGenerator.index');

Route::post('passwordgenerator/generate', 'PasswordGeneratorController@generate')->name('PasswordGenerator.generate');

Route::get('passwordgenerator', 'PasswordGeneratorController@index')->name('PasswordGenerator.index');