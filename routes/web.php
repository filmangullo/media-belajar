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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/courses', 'CoursesController@index')->name('home');

Route::prefix('courses')->middleware('auth')->group(function () {
    Route::get('/', 'CoursesController@index')->name('index.courses');
    Route::get('/{id}/show', 'CoursesController@show')->name('show.courses');
    Route::get('/{id}/enroll', 'CoursesController@enrollCreate')->name('enroll.courses');
    Route::post('/enroll-store', 'CoursesController@enrollStore')->name('enrollStore.courses');
});

Route::prefix('courses-forum')->middleware('auth')->group(function () {
    Route::get('/{id}', 'ForumController@index')->name('showForum.courses');
    Route::get('/{id}/create', 'ForumController@create')->name('createForum.courses');
    Route::post('/{id}/store', 'ForumController@store')->name('storeForum.courses');
});

Route::prefix('courses-forum-pertemuan')->middleware('auth')->group(function () {
    Route::get('/{id}', 'PertemuanController@index')->name('index.pertemuan');

});


Route::resource('about', 'AboutController')->names([
    'index' => 'index.about'
]);

Route::resource('contact', 'ContactController')->names([
    'index' => 'index.contact'
]);
