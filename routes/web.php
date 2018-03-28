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
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@index');
Route::get('students', 'StudentsController@index');
Route::get('busaries/NCMA', 'BusariesController@ncma');
Route::get('busaries/ECMA', 'BusariesController@ecma');
Route::get('busaries/CBLOCK', 'BusariesController@cblock');
Route::get('/employees/facilitators', 'EmployeesController@facilitators');
Route::get('/employees/supportStaff', 'EmployeesController@supportStaff');



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('students', 'StudentsController');
Route::resource('employees', 'EmployeesController');



