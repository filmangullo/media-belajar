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

Route::prefix('/')->group(function () {
    Route::get('', 'WelcomeController@index')->name('index.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/courses', 'CoursesController@index')->name('home');

Route::prefix('courses')->middleware('auth')->group(function () {
    Route::get('/', 'CoursesController@index')->name('index.courses');
    Route::get('/create', 'CoursesController@create')->name('create.courses');
    Route::post('/store', 'CoursesController@store')->name('store.courses');
    Route::get('/{id}/show', 'CoursesController@show')->name('show.courses');
    Route::delete('/{id}/destroy', 'CoursesController@destroy')->name('destroy.courses');
    Route::get('/{id}/enroll', 'CoursesController@enrollCreate')->name('enroll.courses');
    Route::post('/enroll-store', 'CoursesController@enrollStore')->name('enrollStore.courses');
});

Route::prefix('courses-forum')->middleware('auth')->group(function () {
    Route::get('/{id}', 'ForumController@index')->name('showForum.courses');
    Route::get('/{id}/create', 'ForumController@create')->name('createForum.courses');
    Route::post('/{id}/store', 'ForumController@store')->name('storeForum.courses');
    Route::delete('/{id}/destroy', 'ForumController@destroy')->name('destroyForum.courses');
});

Route::prefix('courses-forum-pertemuan')->middleware('auth')->group(function () {
    Route::get('/{id}', 'PertemuanController@index')->name('index.pertemuan');
});

Route::prefix('courses-forum-pertemuan-description')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'DeskripsiController@create')->name('create.deskripsi');
    Route::post('/{id}/store', 'DeskripsiController@store')->name('store.deskripsi');
});

Route::prefix('courses-forum-pertemuan-kuis-panel')->middleware('auth')->group(function () {
    Route::get('/{id}', 'KuisPanelController@index')->name('index.kuispanel');
    Route::get('/{id}/create', 'KuisPanelController@create')->name('create.kuispanel');
    Route::post('/{id}/store', 'KuisPanelController@store')->name('store.kuispanel');
    Route::delete('/{id}/destroy', 'KuisPanelController@destroy')->name('destroy.kuispanel');
});

Route::prefix('courses-forum-pertemuan-diskusi')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'ForumDiskusiController@create')->name('create.diskusi');
    Route::post('/{id}/store', 'ForumDiskusiController@store')->name('store.diskusi');
    Route::get('/{id}/edit', 'ForumDiskusiController@edit')->name('edit.diskusi');
    Route::post('/{id}/update', 'ForumDiskusiController@update')->name('update.diskusi');
});

Route::prefix('courses-forum-pertemuan-diskusi-comment')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'DiskusiCommentController@create')->name('create.diskusicomment');
    Route::post('/{id}/store', 'DiskusiCommentController@store')->name('store.diskusicomment');
});

Route::resource('about', 'AboutController')->names([
    'index' => 'index.about'
]);

Route::resource('contact', 'ContactController')->names([
    'index' => 'index.contact'
]);
