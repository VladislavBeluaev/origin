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
    return view('index');
})->name('home');

Route::get('auth/github', 'AuthController@redirectToProvider')->name('loginGitHub');
Route::get('auth/github/callback', 'AuthController@handleProviderCallback');

Route::get('auth/login', 'AuthController@loginDefault')->name('loginDefault');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard',function(){

	return view('dashboard');
});
Route::get('/test',function(){

	return view('test');
})->middleware('auth');


Route::group(['prefix'=>'documents'],function(){

Route::get('/', 'DocumentController@index')->name('documents');

Route::get('/create', 'DocumentController@create')->name('create');
Route::post('/create', 'DocumentController@store');

Route::get('/{document}', 'DocumentController@show')->name('showDocument');
Route::get('/edit/{document}', 'DocumentController@edit')->name('edit');
Route::get('/history/{document}', 'DocumentController@history')->name('history');
Route::post('/update/{document}', 'DocumentController@update')->name('update');
});

Route::get('/lessons', 'LessonController@index')->name('lessons');