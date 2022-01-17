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

Route::get('/', 'App\Http\Controllers\SiteController@home');

//Site
Route::get('/about','App\Http\Controllers\PageController@about');
Route::get('/artikel','App\Http\Controllers\PageController@artikel');

Route::get('/login','App\Http\Controllers\AuthController@login');
Route::post('/postlogin','App\Http\Controllers\AuthController@postlogin');
Route::get('/logout','App\Http\Controllers\AuthController@logout');


Route::get('/dashboard','App\Http\Controllers\DashboardController@index');
Route::get('/postingan','App\Http\Controllers\PostinganController@index');

//Forum
Route::get('/forum','App\Http\Controllers\ForumController@index');
Route::get('/forum/{forum}/view','App\Http\Controllers\ForumController@view');
Route::post('/forum/{forum}/view','App\Http\Controllers\ForumController@postkomentar');



//Komentar


//Post
Route::get('/posts','App\Http\Controllers\PostController@index')->name('posts.index');
Route::get('post/add', [
    'uses' => 'App\Http\Controllers\PostController@add',
    'as' => 'post.add'
]);
Route::get('/post/{id}/edit','App\Http\Controllers\PostController@edit');
Route::post('/post/{id}/update','App\Http\Controllers\PostController@update');
Route::get('/post/{post}/delete','App\Http\Controllers\PostController@delete');
Route::post('post/create', [
    'uses' => 'App\Http\Controllers\PostController@create',
    'as' => 'posts.create'
]);
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/{slug}', [
    'uses' => 'App\Http\Controllers\SiteController@singlepost',
    'as' => 'site.single.post', 
]);