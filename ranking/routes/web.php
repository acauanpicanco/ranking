<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'CharacterController@index');


Route::get('/manager-list', 'CharacterController@show');

Route::post('/ajax-vote', 'CharacterController@vote');


Route::get('/manager', 'CharacterController@create' )->name('character.create');

Route::post('/character/store', 'CharacterController@store' )->name('character.store');


Route::get('/manager/delete/{id}', 'CharacterController@destroy' )->name('character.delete');


Route::get('/manager/edit/{id}', 'CharacterController@edit' )->name('character.edit');

Route::post('/character/update/{id}', 'CharacterController@update' )->name('character.update');