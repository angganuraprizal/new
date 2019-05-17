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

Route::resource('/', 'FrontendController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::resource('kategori', 'KategoriController');
    Route::resource('artikel', 'ArtikelController');
    Route::post('artikel/verify/{id}', 'ArtikelController@verify')->name('verify');
});
Route::get('/admin/kategori/search','KategoriController@cari');

Route::get('/blog', 'FrontendController@blog');

Route::get('/blog/kategori/{kategori}', 'FrontendController@artikelkategori')->name('filter');

Route::get('/blog/search', 'FrontendController@cari')->name('cari');

Route::get('/blog/{artikels}', 'FrontendController@detail')->name('detail');

Route::get('/auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');