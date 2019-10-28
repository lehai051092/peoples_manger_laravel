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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('peoples')->group(function (){
    Route::get('list','PeopleManager@index')->name('peoples.index');
    Route::get('add','PeopleManager@add')->name('peoples.add');
    Route::post('add','PeopleManager@create')->name('peoples.create');
    Route::get('delete/{id}','PeopleManager@delete')->name('peoples.delete');
    Route::get('edit/{id}','PeopleManager@edit')->name('peoples.edit');
    Route::post('edit/{id}','PeopleManager@update')->name('peoples.update');
    Route::get('search','PeopleManager@search')->name('peoples.search');
});
