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

Route::get('/', 'TeamsController@index');
Route::get('/logout', 'LoginController@logout');

Route::prefix('register')->group(function (){

    Route::get('/', 'RegisterController@create')->name('register');
    Route::post('/', 'RegisterController@store');
});
Route::prefix('teams')->group(function (){

    Route::get('/', 'TeamsController@index');
    Route::get('/{id}', 'TeamsController@show');

});
Route::prefix('players')->group(function (){
    
    Route::get('/{id}', 'PlayersController@show');

});
Route::prefix('login')->group(function (){

    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/', 'LoginController@login');
});

