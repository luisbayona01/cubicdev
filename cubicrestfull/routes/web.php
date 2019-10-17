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
});

Route::post('/usuariosempresa', 'UsuariosController@Userempresaoperadora')->name('show');
Route::post('/logear', 'UsuariosController@Login')->name('logear');
Route::post('/menu', 'UsuariosController@crearmenu')->name('menu');
Route::post('/submenu', 'UsuariosController@submenu')->name('submenu');   
Route::post('/rutasmenu', 'UsuariosController@rutasmenu')->name('rutasmenu');  
Route::post('/empresaregister', 'EmpresaOperadoraController@registrar_empresa')->name('registerempresa');  
Route::get('/showempresa','EmpresaOperadoraController@showempresa')->name('showempresa');
Route::post('/saveUser','UsuariosController@saveUser')->name('saveUser'); 
Route::get('/showusers','UsuariosController@getusers')->name('saveUser');



 
