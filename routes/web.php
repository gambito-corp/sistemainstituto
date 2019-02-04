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
})->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/configuracion', 'usercontroller@config')->name('config');
Route::get('/perfil', 'usercontroller@mostrarperfil')->name('perfil');
Route::post('/user/update', 'usercontroller@update')->name('user.update');


Route::post('/user/avatar/{filename}', 'usercontroller@getImage')->name('user.avatar');


route::get('/user/gestion', 'usercontroller@gestion')->name('user.gestion');
route::get('/user/editar/{id}', 'usercontroller@editar_maestro')->name('user.editar');
Route::post('/user/update_maestro', 'usercontroller@update_maestro')->name('user.update_maestro');

Route::get('/user/{id}/destroy', 'usercontroller@destroy')->name('user.destroy');

Route::get('/user/avatar/{filename}', 'usercontroller@getImage')->name('user.avatar');
