<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/test', 'Auth\LoginController@testRead');

Route::post('/test', 'Auth\LoginController@testSave');

Route::post('/hola', 'DoSpacesController@store')->name('upload');

Route::get('/do', 'DoSpacesController@test');

Route::get('/do', 'DoSpacesController@test2');

Route::get('/home', 'HomeController@index')->name('home');
