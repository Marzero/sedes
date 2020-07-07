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
    Route::get('show_paciente/{id}','PacienteController@show_paciente')->name('show_paciente');
    Route::get('asegurar_paciente/{id}','PacienteController@asegurar_paciente')->name('asegurar_paciente');


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

    Route::get('indice_ordenes','OrdenController@indice_ordenes')->name('indice_ordenes');
    Route::get('show_orden/{id}','OrdenController@show_orden')->name('show_orden');
    Route::post('store_orden','OrdenController@store_orden')->name('store_orden');




    Route::post('agregar_resultados','OrdenController@agregar_resultados')->name('agregar_resultados');
    Route::post('agregar_resultados_especiales','OrdenController@agregar_resultados_especiales')->name('agregar_resultados_especiales');
    Route::post('agregar_resultados_clinicos','OrdenController@agregar_resultados_clinicos')->name('agregar_resultados_clinicos');
    Route::post('agregar_resultados_generales','OrdenController@agregar_resultados_generales')->name('agregar_resultados_generales');
    Route::post('agregar_resultados_quimicas','OrdenController@agregar_resultados_quimicas')->name('agregar_resultados_quimicas');
    



    Route::get('indice_copros','CoproController@indice_copros')->name('indice_copros');
    Route::get('show_copro/{id}','CoproController@show_copro')->name('show_copro');
    Route::post('store_copro','CoproController@store_copro')->name('store_copro');

    Route::get('indice_especiales','EspecialController@indice_especiales')->name('indice_especiales');
    Route::get('show_especial/{id}','EspecialController@show_especial')->name('show_especial');
    Route::post('store_especial','EspecialController@store_especial')->name('store_especial');

    Route::get('indice_clinicos','ClinicoController@indice_clinicos')->name('indice_clinicos');
    Route::get('show_clinico/{id}','ClinicoController@show_clinico')->name('show_clinico');
    Route::post('store_clinico','ClinicoController@store_clinico')->name('store_clinico');

    Route::get('indice_generales','GeneralController@indice_generales')->name('indice_generales');
    Route::get('show_general/{id}','GeneralController@show_general')->name('show_general');
    Route::post('store_general','GeneralController@store_general')->name('store_general');

    

    Route::get('indice_quimicas','QuimicaController@indice_quimicas')->name('indice_quimicas');
    Route::get('show_quimica/{id}','QuimicaController@show_quimica')->name('show_quimica');
    Route::post('store_quimica','QuimicaController@store_quimica')->name('store_quimica');

    Route::get('indice_enfermerias','EnfermeriaController@indice_enfermerias')->name('indice_enfermerias');
    Route::post('store_enfermeria','EnfermeriaController@store_enfermeria')->name('store_enfermeria');
});