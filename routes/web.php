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

Route::get('/', 'HomeController@index')->name('root');

Route::resource('blog', 'PostsController');
Route::get('blog/categorie/{slug}', 'PostsController@category')->name('blog.category');

// Admin Dashboard
Route::prefix('admin')->group(function () {
    Route::get('dashboard', 'Admin\DashboardController@index');
    Route::resource('posts', 'Admin\PostsController');
});