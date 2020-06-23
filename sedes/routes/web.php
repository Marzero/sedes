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
    //return view('welcome');
    return redirect()->route('login');
});
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //asignacion de permisos dinamicos
	Route::get('asignar_permiso/{configuracion}','AjaxController@asignar_permiso');
	route::post('asignaciones/remover', 'AsignacionesController@remover')->name('asignaciones.remover');
	route::post('asignaciones/asignar', 'AsignacionesController@asignar')->name('asignaciones.asignar');

    Route::get('indice_usuarios','UsuariosController@indice_usuarios')->name('indice_usuarios');
    Route::get('cambiar_estado/{id}','UsuariosController@cambiar_estado')->name('cambiar_estado');
    Route::get('nuevo_usuario','UsuariosController@nuevo_usuario')->name('nuevo_usuario');
    Route::post('guardar_usuario','UsuariosController@guardar_usuario')->name('guardar_usuario');
    Route::get('ver_usuario/{id}','UsuariosController@ver_usuario')->name('ver_usuario');
    Route::get('editar_usuario/{id}','UsuariosController@editar_usuario')->name('editar_usuario');
    Route::post('actualizar_usuario','UsuariosController@actualizar_usuario')->name('actualizar_usuario');

    Route::get('indice_permisos','PermisosController@indice_permisos')->name('indice_permisos');
    Route::get('nuevo_permiso','PermisosController@nuevo_permiso')->name('nuevo_permiso');
    Route::post('guardar_permiso','PermisosController@guardar_permiso')->name('guardar_permiso');

    Route::get('indice_pacientes','PacienteController@indice_pacientes')->name('indice_pacientes');
    Route::post('store_paciente','PacienteController@store_paciente')->name('store_paciente');
    Route::post('store_paciente2','PacienteController@store_paciente2')->name('store_paciente2');
    Route::post('actualizar_paciente','PacienteController@actualizar_paciente')->name('actualizar_paciente');


    Route::get('inicio_cuadernos','CuadernoController@inicio_cuadernos')->name('inicio_cuadernos');
    route::get('cuaderno_buscar/{valor}', 'CuadernoController@cuaderno_buscar')->name('cuaderno_buscar');
    Route::post('nueva_atencion','CuadernoController@nueva_atencion')->name('nueva_atencion');
    
});