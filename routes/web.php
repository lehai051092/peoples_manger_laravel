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
    Route::get('list','PeopleManagerController@index')->name('peoples.index');
    Route::get('add','PeopleManagerController@add')->name('peoples.add');
    Route::post('add','PeopleManagerController@create')->name('peoples.create');
    Route::get('delete/{id}','PeopleManagerController@delete')->name('peoples.delete');
    Route::get('edit/{id}','PeopleManagerController@edit')->name('peoples.edit');
    Route::post('edit/{id}','PeopleManagerController@update')->name('peoples.update');
    Route::get('search','PeopleManagerController@search')->name('peoples.search');
});
