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

Route::resource('courses', 'CoursesController')->names([
    'index' => 'index.courses',
    'show' => 'show.courses',
])->middleware('auth');
Route::get('/courses/enroll/{id}', 'CoursesController@enrollCreate')->name('enroll.courses')->middleware('auth');
Route::post('/courses/enroll-store', 'CoursesController@enrollStore')->name('enrollStore.courses')->middleware('auth');

Route::resource('about', 'AboutController')->names([
    'index' => 'index.about'
]);

Route::resource('contact', 'ContactController')->names([
    'index' => 'index.contact'
]);
