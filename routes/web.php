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
    return redirect('/products');
});

Route::resource('/product', 'productController')->except(['index'])->names([
    'show' => 'product.show', 'create' => 'product.new'
]);
Route::get('/products', 'productController@index')->name('product.list');
Route::get('/product/{product}/detail', 'productController@detail')->name('product.detail');

// レビュー
Route::resource('/product.comment', 'CommentController')->only(['create', 'store', 'show', 'edit', 'update'])->names([
    'create' => 'comment.new', 'store' => 'comment.store', 'show' => 'comment.show', 'edit' => 'comment.edit', 'update' => 'comment.update'
]);

// いいね
Route::resource('/product.comment.favorite', 'FavoritesController')->only(['store'])->names([
    'store' => 'favorite.store'
]);

// レビュー依頼
Route::resource('/product.request', 'RequestsController')->only(['store'])->names([
    'store' => 'request.store'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ブランド名から検索
Route::get('/brand', 'productController@brand_show')->name('product.brand_show');

// カテゴリから検索
Route::get('/category', 'productController@category_show')->name('product.category_show');
Route::get('/category/{category}', 'productController@category_search')->name('product.category_search');