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

Route::get('/', 'FrontendController@index');
Route::get('/menu', 'FrontendController@menu');

Route::group(['middleware' => 'admin'], function() {
  Route::get('/admin', 'adminController@dashboard');

  Route::resource('/masakan', 'masakanController');
  Route::get('/masakan/{id}/restore','MasakanController@restore');

  Route::resource('/meja', 'MejaController');
  Route::get('/meja/{id}/restore','MejaController@restore');

  Route::resource('/users', 'UserController');
  Route::get('/users/{id}/restore','UserController@restore');

  Route::resource('/level', 'LevelController');
  Route::resource('/carousel', 'CarouselController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
