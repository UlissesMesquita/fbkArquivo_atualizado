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


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;




//Rotas para Login
Route::GET('/login', 'ControladorLogin@index')->name('index');
Route::POST('/login', 'ControladorLogin@create')->name('valida-login');


//Rotas Dashboard
Route::GET('/', 'ControladorDashboard@index')->name('dashboard');
Route::GET('/pdf/{name_pdf}', 'ControladorDashboard@showPdf')->name('pdf');
Route::GET('/documentos_edit/{id}', 'ControladorDashboard@edit')->name('edit');
Route::PUT('/documentos_update/{id}', 'ControladorDashboard@update')->name('update');
Route::GET('/delete/{id}', 'ControladorDashboard@destroy')->name('delete_documento');

//Rotas Criação de Novos Documentos
Route::GET('/documento', 'ControladorDocumento@create')->name('documentos_create');
Route::POST('/documento/novo', 'ControladorDocumento@store')->name('novo_documento');

//Rotas Departamentos
Route::GET('/departamento', 'ControladorDepartamento@index')->name('departamento_index');
Route::POST('/departamento/novo', 'ControladorDepartamento@store')->name('novo_departamento');
Route::GET('/departamento/delete/{id}', 'ControladorDepartamento@destroy')->name('departamento_delete');
Route::GET('/departamento/edit/{id}', 'ControladorDepartamento@edit')->name('departamento_edit');
Route::PUT('/departamento/update/{id}', 'ControladorDepartamento@update')->name('departamento_update');

//Rotas Origens
Route::GET('/origem', 'ControladorOrigem@index')->name('origem_index');
Route::POST('/origem/novo', 'ControladorOrigem@store')->name('novo_origem');
Route::GET('/origem/delete/{id}', 'ControladorOrigem@destroy')->name('origem_delete');
Route::GET('/origem/edit/{id}', 'ControladorOrigem@edit')->name('origem_edit');
Route::PUT('/origem/update/{id}', 'ControladorOrigem@update')->name('origem_update');

//Rotas Emitentes
Route::GET('/emitente', 'ControladorEmitente@index')->name('emitente_index');
Route::POST('/emitente/novo', 'ControladorEmitente@store')->name('novo_emitente');
Route::GET('/emitente/delete/{id}', 'ControladorEmitente@destroy')->name('emitente_delete');
Route::GET('/emitente/edit/{id}', 'ControladorEmitente@edit')->name('emitente_edit');
Route::PUT('/emitente/update/{id}', 'ControladorEmitente@update')->name('emitente_update');

//Rotas Destinatarias
Route::GET('/destinataria', 'ControladorDestinataria@index')->name('destinataria_index');
Route::POST('/destinataria/novo', 'ControladorDestinataria@store')->name('novo_destinataria');
Route::GET('/destinataria/delete/{id}', 'ControladorDestinataria@destroy')->name('destinataria_delete');
Route::GET('/destinataria/edit/{id}', 'ControladorDestinataria@edit')->name('destinatarias_edit');
Route::PUT('/destinataria/update/{id}', 'ControladorDestinataria@update')->name('destinataria_update');

//Rotas Para Pesquisas
Route::GET('/pesquisas', 'ControladorPesquisas@index')->name('pesquisa_index');
Route::POST('/pesquisas', 'ControladorPesquisas@show')->name('pesquisa_novo');
Route::POST('/pesquisas/getPdf','ControladorPesquisas@getPdf')->name('pesquisa_getPdf');

//Rotas Para Configurações de usuários
Route::GET('/config/usuarios', 'ControladorLogin@show')->name('configuracoes-usuarios');
Route::GET('/config/usuarios/delete/{id}', 'ControladorLogin@destroy')->name('usuarios-delete');
Route::POST('/config/usuarios', 'ControladorLogin@store')->name('create-store');
Route::GET('/config/usuarios/edit/{id}', 'ControladorLogin@edit')->name('usuarios-edit');
Route::PUT('/config/usuarios/update/{id}', 'ControladorLogin@update')->name('usuarios-update');

