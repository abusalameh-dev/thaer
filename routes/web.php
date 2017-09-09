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




Route::get('/', function () {
    return redirect('/app');
});
Auth::routes();

Route::prefix('app')->middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');	
    Route::get('/', function () {
        return redirect('/app/home');
    });
    Route::resource('products', 'ProductsController');
    Route::resource('category', 'CategoriesController',['except' => ['show', 'destroy']]);
    Route::resource('provider', 'ProvidersController',['except' => ['show', 'destroy']]);

    Route::get('/api/products','ProductsController@getAll')->name('api.products');
    Route::get('/api/providers','ProvidersController@getAll')->name('api.providers');
    Route::get('/api/categories','CategoriesController@getAll')->name('api.categories');
});