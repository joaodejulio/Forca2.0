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

Route::get('/game', function () {
    return view('game'); 
});

Route::get('/instructions', function () {    
    return view('instructions'); 
});
Route::get('/about', function () {    
    return view('about'); 
});


Route::get('/scoreboard', 'PartidaController@scoreboard')->name('scoreboard');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/game', 'PartidaController@index')->name('game');
Route::get('/game/sorteio', 'PartidaController@sorteiaPalavra')->name('game.sorteio');
Route::post('/game/letra', 'PartidaController@verificaLetra')->name('game.letra');



Route::get('admin/home', 'PalavraController@index')->name('admin.home')->middleware('is_admin');

Route::post('admin/createPalavra', 'PalavraController@create')->name('admin.createPalavra')->middleware('is_admin');
Route::get('admin/storePalavra', 'PalavraController@store')->name('admin.storePalavra')->middleware('is_admin');
Route::get('admin/destroyPalavra', 'PalavraController@destroy')->name('admin.destroyPalavra')->middleware('is_admin');
Route::get('admin/editPalavra', 'PalavraController@edit')->name('admin.editPalavra')->middleware('is_admin');
Route::get('admin/updatePalavra', 'PalavraController@update')->name('admin.updatePalavra')->middleware('is_admin');

Route::resource('admin/palavras', 'PalavraController');