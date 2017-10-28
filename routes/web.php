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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function namesRouteRessource (string $name): array
{
    return ['names' => [
        'index'     => 'admin.' . $name . '.index',
        'edit'      => 'admin.' . $name . '.edit',
        'update'    => 'admin.' . $name . '.update',
        'show'      => 'admin.' . $name . '.show',
        'create'    => 'admin.' . $name . '.create',
        'store'     => 'admin.' . $name . '.store',
        'destroy'   => 'admin.' . $name . '.destroy'
    ]];
}

Route::get('/', function () {
    // TODO Create home controller
    return view('welcome');
})->name('root');

Route::resource('blog', 'PostsController');
Route::get('blog/categorie/{slug}', 'PostsController@category')->name('blog.category');

// Authentication
Auth::routes();
Route::get('/verify/{id}/{token}', 'Auth\RegisterController@confirm')->name('auth.confirm');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('blog', 'PostController', namesRouteRessource('blog'));
    Route::resource('role', 'RoleController', namesRouteRessource('role'));
    Route::resource('permission', 'PermissionController', namesRouteRessource('permission'));
    Route::resource('user', 'UserController', namesRouteRessource('user'));
    /*Route::resources([
        'blog'        => 'PostController',
        'role'        => 'RoleController',
        'permission'  => 'PermissionController',
        'user'        => 'UserController'
    ]);*/
});
