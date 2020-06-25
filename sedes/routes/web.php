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
    Route::get('ver_cuaderno/{id}','CuadernoController@ver_cuaderno')->name('ver_cuaderno');


    Route::get('show_receta/{id}','RecetaController@show_receta')->name('show_receta');
    Route::post('store_receta','RecetaController@store_receta')->name('store_receta');
    Route::get('crear_receta_cuaderno/{id}','RecetaController@crear_receta_cuaderno')->name('crear_receta_cuaderno');
    Route::post('agregar_indicacion','RecetaController@agregar_indicacion')->name('agregar_indicacion');

    Route::get('indice_mordeduras','MordeduraController@indice_mordeduras')->name('indice_mordeduras');
    Route::post('store_mordedura','MordeduraController@store_mordedura')->name('store_mordedura');
    Route::get('show_mordedura/{id}','MordeduraController@show_mordedura')->name('show_mordedura');
    Route::post('store_dosis','MordeduraController@store_dosis')->name('store_dosis');

    Route::get('indice_certificados','CertificadoController@indice_certificados')->name('indice_certificados');
    Route::post('store_certificado','CertificadoController@store_certificado')->name('store_certificado');
    Route::get('show_certificado/{id}','CertificadoController@show_certificado')->name('show_certificado');
});