<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/movies', 'App\Http\Controllers\MovieController@index')->name("movie.index");
Route::get('/movies/{id}', 'App\Http\Controllers\MovieController@show')->name("movie.show");

Route::middleware('client')->group(function () {
    Route::post('/movies/reviews', 'App\Http\Controllers\ReviewController@store')->name("review.store");

    Route::get('/news', 'App\Http\Controllers\NewsController@index')->name("news.index");
    Route::get('/news/{id}', 'App\Http\Controllers\NewsController@show')->name("news.show");

    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
    Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
    Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");

    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/movies', 'App\Http\Controllers\Admin\AdminMovieController@index')->name("admin.movie.index");
    Route::post('/admin/movies/store', 'App\Http\Controllers\Admin\AdminMovieController@store')->name("admin.movie.store");
    Route::delete('/admin/movies/{id}/delete', 'App\Http\Controllers\Admin\AdminMovieController@delete')->name("admin.movie.delete");
    Route::get('/admin/movies/{id}/edit', 'App\Http\Controllers\Admin\AdminMovieController@edit')->name("admin.movie.edit");
    Route::put('/admin/movies/{id}/update', 'App\Http\Controllers\Admin\AdminMovieController@update')->name("admin.movie.update");

    Route::get('/admin/news', 'App\Http\Controllers\Admin\AdminNewsController@index')->name("admin.news.index");
    Route::post('/admin/news/store', 'App\Http\Controllers\Admin\AdminNewsController@store')->name("admin.news.store");
    Route::delete('/admin/news/{id}/delete', 'App\Http\Controllers\Admin\AdminNewsController@delete')->name("admin.news.delete");
    Route::get('/admin/news/{id}/edit', 'App\Http\Controllers\Admin\AdminNewsController@edit')->name("admin.news.edit");
    Route::put('/admin/news/{id}/update', 'App\Http\Controllers\Admin\AdminNewsController@update')->name("admin.news.update");
});

Auth::routes();
