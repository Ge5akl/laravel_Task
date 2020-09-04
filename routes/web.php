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
Route::post('/home','CommentController@create');
Route::get('/', 'HomeController@showAuthUserPost');	
//Route::get('/home/{user}', 'HomeController@showUsersPost');
Route::get('/home/dellCommet/{id}', 'CommentController@deleteAuthUserComments');
Route::get('/user/{user}', 'CommentController@showOutherUserComment');
Route::post('/user/{user}/', 'CommentController@createOutherUserComment');
Route::get('/home', 'CommentController@showAuthUserComments');
Route::get('/home/comments', 'CommentController@showAllAuthUserComments');
Route::get('home/creteComments/{Object_id}/{id}', 'CommentController@createAnswerComments');
Route::post('home/creteComments/{Object_id}/{id}', 'CommentController@createAnswerComments');
Route::get('/home/comments/com', 'CommentController@getOuhterComment');

