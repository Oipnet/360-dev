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
    // TODO Create home controller
    return view('welcome');
})->name('root');

Route::resource('blog', 'PostsController');
Route::get('blog/categorie/{slug}', 'PostsController@category')->name('blog.category');

// Authentication
Auth::routes();
Route::get('/verify/{id}/{token}', 'Auth/RegisterController@confirm')->name('auth.confirm');

Route::get('/home', 'HomeController@index')->name('home');
