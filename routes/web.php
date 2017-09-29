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
});

Route::resource('designs', 'DesignsController');
Route::resource('blog', 'BlogController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', 'UsersController@getAll')->name('account')->middleware('auth');