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
Route::post('/admin', 'AdminController@dashboard')->name('admin.login');

Route::get('/dashboard', 'AdminController@showDashboard')->name('admin.dashboard');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');


// Categories product
Route::prefix('categories-product')->group(function() {
    Route::get('/', [
        'as' => 'categories-product.index',
        'uses' => 'CategoryProductController@index'
    ]);

    Route::get('/create', [
        'as' => 'categories-product.create',
        'uses' => 'CategoryProductController@create'
    ]);

    Route::post('/store', [
        'as' => 'categories-product.store',
        'uses' => 'CategoryProductController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'categories-product.edit',
        'uses' => 'CategoryProductController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'categories-product.update',
        'uses' => 'CategoryProductController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'categories-product.delete',
        'uses' => 'CategoryProductController@delete'
    ]);



    Route::get('/unactive/{id}', [
        'as' => 'categories-product.unactive',
        'uses' => 'CategoryProductController@unactive'
    ]);

    Route::get('/active/{id}', [
        'as' => 'categories-product.active',
        'uses' => 'CategoryProductController@active'
    ]);
});


// Brand product
Route::prefix('brand-product')->group(function() {
    Route::get('/', [
        'as' => 'brand-product.index',
        'uses' => 'BrandProductController@index'
    ]);

    Route::get('/create', [
        'as' => 'brand-product.create',
        'uses' => 'BrandProductController@create'
    ]);

    Route::post('/store', [
        'as' => 'brand-product.store',
        'uses' => 'BrandProductController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'brand-product.edit',
        'uses' => 'BrandProductController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'brand-product.update',
        'uses' => 'BrandProductController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'brand-product.delete',
        'uses' => 'BrandProductController@delete'
    ]);



    Route::get('/unactive/{id}', [
        'as' => 'brand-product.unactive',
        'uses' => 'BrandProductController@unactive'
    ]);

    Route::get('/active/{id}', [
        'as' => 'brand-product.active',
        'uses' => 'BrandProductController@active'
    ]);

});


// product
Route::prefix('products')->group(function () {
    Route::get('/', [
        'as' => 'products.index',
        'uses' => 'ProductController@index'
    ]);

    Route::get('/create', [
        'as' => 'products.create',
        'uses' => 'ProductController@create'
    ]);

    Route::post('/store', [
        'as' => 'products.store',
        'uses' => 'ProductController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'products.edit',
        'uses' => 'ProductController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'products.update',
        'uses' => 'ProductController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'products.delete',
        'uses' => 'ProductController@delete'
    ]);




    Route::get('/unactive/{id}', [
        'as' => 'products.unactive',
        'uses' => 'ProductController@unactive'
    ]);

    Route::get('/active/{id}', [
        'as' => 'products.active',
        'uses' => 'ProductController@active'
    ]);
});