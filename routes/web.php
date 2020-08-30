<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::post('/home','HomeController@create');
Route::get('/', 'HomeController@showAuthUserPost');	
//Route::get('/home/{user}', 'HomeController@showUsersPost');
Route::get('/home/{user}', 'HomeController@showOutherUserComment');
Route::post('/home/{user}', 'HomeController@createOutherUserComment');
Route::get('/home', 'HomeController@showAuthUserComments');
