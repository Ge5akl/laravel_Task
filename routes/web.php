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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/{$id}', function ($id) {
	$users = DB::table('users')->find($id);
	dd($users);
    return view('home', compact('users'));	
});

Route::get('/home', function () {
	$commetns = App\Commetns::all();
    return view('users.index', compact('commetns'));	
});



Auth::routes();

Route::get('/users', 'HomeController@index');
