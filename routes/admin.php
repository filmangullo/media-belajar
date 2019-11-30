<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.home');

// Instansi Route
Route::prefix('instansi')->group(function () {
    Route::get('/create', 'InstansiController@create')->name('adm.instansi.create');
    Route::post('/store', 'InstansiController@store')->name('adm.instansi.store');
});

// Kelas / Mata Pelajaran Per Instansi
Route::prefix('kelas-mata-pelajaran')->group(function () {
    Route::get('/index/{id}', 'KelasMataPelajaranController@index')->name('adm.kelasmatapelajaran.index');
    Route::get('/create/{id}', 'KelasMataPelajaranController@create')->name('adm.kelasmatapelajaran.create');
    Route::post('/store', 'KelasMataPelajaranController@store')->name('adm.kelasmatapelajaran.store');
});
