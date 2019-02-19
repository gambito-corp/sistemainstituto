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
    return view('principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//estas no me deja entran sale error
Route::get('/configuracion','usercontroller@config')->name('config');
Route::get('/perfil','usercontroller@mostrarperfil')->name('perfil');

//estas si me deja entrar 
Route::post('/user/update','usercontroller@update')->name('user.update');
Route::post('/user/avatar/{filename}','usercontroller@getImage')->name('user.avatar');
route::get('/user/gestion','usercontroller@gestion')->name('user.gestion');
route::get('/user/editar/{id}', 'usercontroller@editar_maestro')->name('user.editar');
Route::post('/user/update_maestro','usercontroller@update_maestro')->name('user.update_maestro');
Route::get('/user/{id}/destroy','usercontroller@destroy')->name('user.destroy');



Route::get('/user/avatar/{filename}','usercontroller@getImage')->name('user.avatar');

Route::get('/user/avatar/{filename}', 'usercontroller@getImage')->name('user.avatar');





Route::get('/testeos', 'HomeController@test')->name('test');

//crud de Carreras
Route::resource('Carreras','CarreraController');
//crud de Periodos
Route::resource('Periodos','PeriodoController');
//crud de Cursos
Route::resource('Cursos','CursoController');
//crud de Silabus
Route::resource('Silabus','SilabusController');
//crud de Documentos
Route::resource('Documentos','DocumentoController');
//crud de ciclos
Route::resource('Ciclos','CicloController');
//RUTAS DE FRONT


Route::get('/index','HomeController@principal');
Route::get('/somos','HomeController@quienes')->name('somos');
Route::get('/mision','HomeController@mision')->name('mision');
Route::get('/vision','HomeController@vision')->name('vision');
Route::get('/docentes','HomeController@docentes')->name('docentes');
Route::get('/suficiencia','HomeController@suficiencia')->name('suficiencia');
Route::get('/extraordinarios','HomeController@extraordinarios')->name('extraordinarios');
Route::get('/t_english','HomeController@t_english')->name('t_english');
Route::get('/videos','HomeController@videos')->name('videos');
Route::get('/blog','HomeController@blog')->name('blog');
Route::get('/intranet','HomeController@intranet')->name('intranet');
Route::get('/contactenos','HomeController@contactenos')->name('contactenos');
