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

// Forum Per Kelas / Mata Pelajaran Per Instansi
Route::prefix('forum-on-kelas-mata-pelajaran')->group(function () {
    Route::get('/index/{id}', 'ForumController@index')->name('adm.forum.index');
    Route::get('/create/{id}', 'ForumController@create')->name('adm.forum.create');
    Route::post('/store', 'ForumController@store')->name('adm.forum.store');
});



// User Control
Route::prefix('user')->group(function () {
    Route::get('/index', 'UserController@index')->name('adm.user.index');
    Route::get('/edit/{id}', 'UserController@edit')->name('adm.user.edit');
    Route::post('/update/{id}', 'UserController@update')->name('adm.user.update');
});

// Pengajar Control
Route::prefix('pengajar')->group(function () {
    Route::get('/index', 'PengajarController@index')->name('adm.pengajar.index');
    Route::get('/edit/{id}', 'PengajarController@edit')->name('adm.pengajar.edit');
    Route::post('/update/{id}', 'PengajarController@update')->name('adm.pengajar.update');
});

// Pelajar Control
Route::prefix('pelajar')->group(function () {
    Route::get('/index', 'PelajarController@index')->name('adm.pelajar.index');
    Route::get('/edit/{id}', 'PelajarController@edit')->name('adm.pelajar.edit');
    Route::post('/update/{id}', 'PelajarController@update')->name('adm.pelajar.update');
});
