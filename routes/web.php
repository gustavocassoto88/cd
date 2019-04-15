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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'companies'], function(){

        Route::get('/', 'CompaniesController@index')->name('companies');    

        Route::get('/create', 'CompaniesController@create');

        Route::post('/', 'CompaniesController@store');

        Route::get('/{id}', 'CompaniesController@edit');

        Route::post('/update/{id}', 'CompaniesController@update');

        Route::get('/destroy/{id}', 'CompaniesController@destroy');

    });


    Route::group(['prefix' => 'employees'], function(){

        Route::get('/', 'EmployeesController@index');      

        Route::get('/create', 'EmployeesController@create');

        Route::post('/', 'EmployeesController@store');

        Route::get('/{id}', 'EmployeesController@edit');

        Route::post('/update/{id}', 'EmployeesController@update');

        Route::get('/destroy/{id}', 'EmployeesController@destroy');

    });

 });