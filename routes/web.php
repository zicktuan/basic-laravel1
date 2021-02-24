<?php

use Illuminate\Support\Facades\Route;

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
//Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');


//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/login', 'AdminController@index');
Route::get('/dashboard', 'AdminController@showDashboard');
Route::post('/admin', 'AdminController@dashboard')->name('admin.login');