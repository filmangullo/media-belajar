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

