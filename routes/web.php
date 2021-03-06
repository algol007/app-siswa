<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');

Route::group(['middleware' => ['web']], function () {
  Route::get('/siswa', 'SiswaController@index');
  Route::post('/siswa', 'SiswaController@store');
  Route::get('/siswa/create', 'SiswaController@create');
  Route::get('/siswa/{siswa}', 'SiswaController@show');
  Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
  Route::patch('/siswa/{siswa}', 'SiswaController@update');
  Route::delete('/siswa/{siswa}', 'SiswaController@destroy');

  Route::get('/kelas', 'KelasController@index');
  Route::post('/kelas', 'KelasController@store');
  Route::get('/kelas/create', 'KelasController@create');
  Route::get('/kelas/{kelas}', 'KelasController@show');
  Route::get('/kelas/{kelas}/edit', 'KelasController@edit');
  Route::patch('/kelas/{kelas}', 'KelasController@update');
  Route::delete('/kelas/{kelas}', 'KelasController@destroy');

  Route::get('/hobi', 'HobiController@index');
  Route::post('/hobi', 'HobiController@store');
  Route::get('/hobi/create', 'HobiController@create');
  Route::get('/hobi/{hobi}', 'HobiController@show');
  Route::get('/hobi/{hobi}/edit', 'HobiController@edit');
  Route::patch('/hobi/{hobi}', 'HobiController@update');
  Route::delete('/hobi/{hobi}', 'HobiController@destroy');
});
