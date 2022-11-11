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
})->name('home');

Route::get('/enviar-correo', 'EnviarCorreoController@index')->name('enviar-correo');
Route::post('/enviar-correo', 'EnviarCorreoController@post_correo')->name('enviar-correo-form');
