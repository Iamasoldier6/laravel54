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

// 文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
// 创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
// 文章详情页
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
// 编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
// 删除文章
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
// 图片上传
Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');

