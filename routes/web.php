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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hiragana',[
	'uses'=>'HiraganaController@index',
	'as' => 'hiragana_view'
]);

Route::post('/hiragana',[
	'uses'=>'HiraganaController@checkAnswer',
	'as' => 'hiragana_check_answer'
]);

Route::get('/vocabulary',[
	'uses'=>'VocabularyController@index',
	'as' => 'vocabulary_view'
]);

Route::post('/vocabulary',[
	'uses'=>'VocabularyController@checkAnswer',
	'as' => 'vocabulary_check_answer'
]);
