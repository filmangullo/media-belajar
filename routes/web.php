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
    Route::get('/cari', 'WelcomeController@search')->name('index.search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('my-courses')->middleware('auth')->group(function () {
    Route::get('/', 'MyCoursesController@index')->name('index.my_courses');
});

Route::prefix('profil')->middleware('auth')->group(function () {
    Route::post('/', 'ProfilController@index')->name('index.profil');
    Route::get('/{id}/edit', 'ProfilController@edit')->name('edit.profil');
    Route::post('/{id}/update', 'ProfilController@update')->name('update.profil');
});

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
    Route::get('/{id}/edit', 'ForumController@edit')->name('editForum.courses');
    Route::post('/{id}/update', 'ForumController@update')->name('updateForum.courses');
    Route::delete('/{id}/destroy', 'ForumController@destroy')->name('destroyForum.courses');
});

Route::prefix('courses-forum-pertemuan')->middleware('auth')->group(function () {
    Route::get('/{id}', 'PertemuanController@index')->name('index.pertemuan');

});

Route::prefix('courses-forum-pertemuan-description')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'DeskripsiController@create')->name('create.deskripsi');
    Route::post('/{id}/store', 'DeskripsiController@store')->name('store.deskripsi');
    Route::get('/{id}/edit', 'DeskripsiController@edit')->name('edit.deskripsi');
    Route::post('/{id}/update', 'DeskripsiController@update')->name('update.deskripsi');
    Route::get('/{id}/destroy', 'DeskripsiController@destroy')->name('destroy.deskripsi');
});

Route::prefix('courses-forum-pertemuan-file')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'ForumFileController@create')->name('create.file');
    Route::post('/{id}/store', 'ForumFileController@store')->name('store.file');
    Route::get('/{id}', 'ForumFileController@download')->name('download.file');
    Route::get('/{id}/delete', 'ForumFileController@destroy')->name('destroy.file');
});

Route::prefix('courses-forum-pertemuan-video-add')->middleware('auth')->group(function () {
    Route::get('/{id}/create', 'ForumVideoController@create')->name('create.video');
    Route::post('/{id}/store', 'ForumVideoController@store')->name('store.video');
});

Route::prefix('courses-forum-pertemuan-kuis-panel')->middleware('auth')->group(function () {
    Route::get('/{id}', 'KuisPanelController@index_panel')->name('index.kuispanel');
    Route::post('/{id}/update_panel', 'KuisPanelController@update_panel')->name('update_panel.kuispanel');
    Route::get('/{id}/create_soal', 'KuisPanelController@create_soal')->name('create_soal.kuispanel');
    Route::post('/{id}/store_soal', 'KuisPanelController@store_soal')->name('store_soal.kuispanel');
    Route::get('/{id}/edit_soal', 'KuisPanelController@edit_soal')->name('edit_soal.kuispanel');
    Route::post('/{id}/update_soal', 'KuisPanelController@update_soal')->name('update_soal.kuispanel');
    Route::delete('/{id}/destroy_soal', 'KuisPanelController@destroy_soal')->name('destroy_soal.kuispanel');
});

Route::prefix('courses-forum-pertemuan-kuis-nilai')->middleware('auth')->group(function () {
    Route::get('/{id}', 'KuisNilaiController@index')->name('index.kuisnilai');
});

Route::prefix('courses-forum-pertemuan-kuis-telah-dimulai')->middleware('auth')->group(function () {
    Route::get('/{id}', 'KuisController@index')->name('index.kuis');
    Route::post('/{id}/calculate', 'KuisController@calculate')->name('index.calculateKuis');
});

Route::prefix('courses-forum-pertemuan-tugas-panel')->middleware('auth')->group(function () {
    Route::get('/{id}', 'TugasPanelController@index')->name('index.tugaspanel');
    Route::post('/{id}/update_panel', 'TugasPanelController@update_panel')->name('update_panel.tugaspanel');
    Route::get('/{id}/create_tugas', 'TugasPanelController@create_tugas')->name('create_tugas.tugaspanel');
    Route::post('/{id}/store_tugas', 'TugasPanelController@store_tugas')->name('store_tugas.tugaspanel');
    Route::get('/{id}/edit_tugas', 'TugasPanelController@edit_tugas')->name('edit_tugas.tugaspanel');
    Route::post('/{id}/update_tugas', 'TugasPanelController@update_tugas')->name('update_tugas.tugaspanel');
    Route::delete('/{id}/destroy_tugas', 'TugasPanelController@destroy_tugas')->name('destroy_tugas.tugaspanel');

    Route::get('/{id}/open_file', 'TugasPanelController@open_file')->name('open_file.tugaspanel');
    Route::post('/{id}/upload_file', 'TugasPanelController@upload_file')->name('upload_file.tugaspanel');
    Route::get('/{id}/download', 'TugasPanelController@download')->name('download.tugasonpanel');
    Route::get('/{id}/change_file', 'TugasPanelController@change_file')->name('change_file.tugaspanel');
    Route::post('/{id}/save_change_file', 'TugasPanelController@save_change_file')->name('save_change_file.tugaspanel');
    Route::delete('/{id}/destroy_file', 'TugasPanelController@destroy_file')->name('destroy_file.tugaspanel');
});

Route::prefix('courses-forum-pertemuan-tugas-yang-telah-di-kumpulkan')->middleware('auth')->group(function () {
    Route::get('/{id}', 'TugasPelajarController@index')->name('index.tugaspelajar');
    Route::get('/{id}/show', 'TugasPelajarController@show')->name('show.tugaspelajar');
    Route::get('/{id}/download', 'TugasPelajarController@download')->name('download.tugaspelajar');
});

Route::prefix('courses-forum-pertemuan-tugas-telah-dimulai-dikumpul')->middleware('auth')->group(function () {
    Route::get('/{id}', 'TugasController@index')->name('index.tugas');
    Route::post('/{id}', 'TugasController@store')->name('store.tugas');
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
    Route::get('/{id}/edit', 'DiskusiCommentController@edit')->name('edit.diskusicomment');
    Route::post('/{id}/update', 'DiskusiCommentController@update')->name('update.diskusicomment');
    Route::delete('/{id}/destroy', 'DiskusiCommentController@destroy')->name('destroy.diskusicomment');
});

Route::resource('contact', 'ContactController')->names([
    'index' => 'index.contact',
    'store' => 'store.contact'
]);

Route::get('tentang', 'TentangController@index')->name('tentang');