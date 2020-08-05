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

// website
Route::get('website','WebController@index')->name('website');
// Route::get('website/{$slug}','WebController@show')->name('website.show');
Route::get('website/{slug}','WebController@show')->name('website.show');
// end website

// berita
Route::get('berita','BeritaController@index')->name('berita');
Route::get('berita/create','BeritaController@create')->name('berita.create');
Route::post('berita/store','BeritaController@store')->name('berita.store');
Route::get('berita/{id}','BeritaController@show')->name('berita.show');
Route::get('berita/{id}/edit','BeritaController@edit')->name('berita.edit');
Route::post('berita/{id}/update','BeritaController@update')->name('berita.update');
Route::get('berita/{id}/delete','BeritaController@delete')->name('berita.delete');
// end berita
