<?php

Route::get('/', function () {
    // TODO Create home controller
    return view('welcome');
})->name('root');

Route::resource('blog', 'PostController')->only(['index', 'show']);
Route::resource('tuto', 'TutoController')->only(['index', 'show']);
Route::resource('category', 'CategoryController')->only(['index', 'show']);
