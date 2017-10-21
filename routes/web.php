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

Route::get('/blog', 'PostsController@index')->name('posts.index');
Route::get('/blog/{slug}', 'PostsController@view')
    ->name('posts.view')
    ->where(['slug' => '^[a-z0-9]+(?:-[a-z0-9]+)*$']);