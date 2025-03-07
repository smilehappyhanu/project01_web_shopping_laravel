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
// Route for admin side
Route::get('/home', function () {
    return view('home');
});

Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@handleLoginAdmin');


Route::prefix('admin')->group(function () {
    // Route for category 
    Route::prefix('category')->group(function () {
        Route::get('/', [
            "as" => "categories.index",
            "uses" => "CategoryController@index"
        ]);
        Route::get('/create', [
            "as" => "categories.create",
            "uses" => "CategoryController@create"
        ]);
        Route::post('/store', [
            "as" => "categories.store",
            "uses" => "CategoryController@store"
        ]);
        Route::get('/edit/{id}', [
            "as" => "categories.edit",
            "uses" => "CategoryController@edit"
        ]);
        Route::post('/update/{id}', [
            "as" => "categories.update",
            "uses" => "CategoryController@update"
        ]);
        Route::get('/delete/{id}', [
            "as" => "categories.delete",
            "uses" => "CategoryController@delete"
        ]);
    });
    // Route for menu
    Route::prefix('menu')->group(function () {
        Route::get('/', [
            "as" => "menus.index",
            "uses" => "MenuController@index"
        ]);
        Route::get('/create', [
            "as" => "menus.create",
            "uses" => "MenuController@create"
        ]);
        Route::post('/store', [
            "as" => "menus.store",
            "uses" => "MenuController@store"
        ]);
        Route::get('/edit/{id}', [
            "as" => "menus.edit",
            "uses" => "MenuController@edit"
        ]);
        Route::post('/update/{id}', [
            "as" => "menus.update",
            "uses" => "MenuController@update"
        ]);
        Route::get('/delete/{id}', [
            "as" => "menus.delete",
            "uses" => "MenuController@delete"
        ]);
    });
    // Route for product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            "as" => "products.index",
            "uses" => "AdminProductController@index"
        ]);
        Route::get('/create', [
            "as" => "products.create",
            "uses" => "AdminProductController@create"
        ]);
        Route::post('/store', [
            "as" => "products.store",
            "uses" => "AdminProductController@store"
        ]);
        Route::get('/edit/{id}', [
            "as" => "products.edit",
            "uses" => "AdminProductController@edit"
        ]);
        Route::post('/update/{id}', [
            "as" => "products.update",
            "uses" => "AdminProductController@update"
        ]);
        Route::get('/delete/{id}', [
            "as" => "products.delete",
            "uses" => "AdminProductController@delete"
        ]);
    });
    // Route for slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            "as" => "sliders.index",
            "uses" => "AdminSliderController@index"
        ]);
        Route::get('/create', [
            "as" => "sliders.create",
            "uses" => "AdminSliderController@create"
        ]);
        Route::post('/store', [
            "as" => "sliders.store",
            "uses" => "AdminSliderController@store"
        ]);
        Route::get('/edit/{id}', [
            "as" => "sliders.edit",
            "uses" => "AdminSliderController@edit"
        ]);
        Route::post('/update/{id}', [
            "as" => "sliders.update",
            "uses" => "AdminSliderController@update"
        ]);
        Route::get('/delete/{id}', [
            "as" => "sliders.delete",
            "uses" => "AdminSliderController@delete"
        ]);
    });
});
