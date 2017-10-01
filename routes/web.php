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

//premiere page home => on a un bouton pour aller sur la plateform et on tombe sur les designs futur (ou l'on peut voter.
//Deuxieme page => accès au vote, accès au design selectionner cette semaine, accès au integration faites (passé)


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.statics.home');
})->name('/');
Route::get('/home', 'HomeController@index')->name('home');


// Route : Designs
Route::resource('designs', 'DesignsController');
Route::get('designs/create', 'DesignsController@create')->name('designs.create')->middleware('auth');


// Route : Blog
Route::resource('blog', 'BlogController');
Route::get('blog/create', 'BlogController@create')->name('posts.create')->middleware('auth');
Route::get('blog/{title}', 'BlogController@show')->name('posts.show');


// Route Tags
Route::get('designs/tags/{name}', 'TagsController@getDesignsByTags')->name('tags.designs');
Route::get('blog/tags/{name}', 'TagsController@getPostsByTags')->name('tags.posts');


// Route Categories
Route::get('blog/categories/{name}', 'CategoriesController@getPostsByCategory')->name('categories.posts');
Route::get('designs/categories/{name}', 'CategoriesController@getDesignsByCategory')->name('categories.designs');


// Route : Users
Auth::routes();
Route::get('/account', 'UsersController@getAll')->name('account')->middleware('auth');
Route::get('/view/{name}', 'UsersController@show')->name('user.show');
Route::get('/account/{id}', 'UsersController@edit')->name('user.edit')->middleware('auth');
Route::post('/account/{id}', 'UsersController@update')->name('user.update')->middleware('auth');

// Route : Admin
Route::get('/admin', 'BackendController@index')->name('admin')->middleware('auth');