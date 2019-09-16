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


//Route::get('/','shop\CatalogController@index');
Route::get('/','\App\Http\Controllers\Shop\CatalogController@index');

Route::get('/shop', function () {
    return view('welcome');
});
Route::get('users', function () {
    return view('welcome');
});

//Route::get('goods','shop\GoodsController@index')->middleware('auth');
Route::resource("goods", "\App\Http\Controllers\Shop\GoodsController",
    [
        'names' => [
            'index' => 'goods',
//            'create' => 'goods.create',
//            'list' => 'goods.list',

        ]
    ]
);

Route::delete("/goods/images/{id}", "\App\Http\Controllers\Shop\GoodsController@removeImages") ->name("goods.images.remove");

// auth
//Route::get('login', function() {
//    return view('welcome');
//})->name('login');
//Route::get('register', function() {
//    return view('welcome');
//})->name('register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


