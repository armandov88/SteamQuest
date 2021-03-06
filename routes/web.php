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
    return view('index');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('index');

Route::get('/u/{id}', 'ProfileController@show');
Route::get('/u', 'ProfileController@index');

Route::resource('/g', 'GroupsController');