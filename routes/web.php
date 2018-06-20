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
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);


    //Routes of CategoryController for CRUD
    Route::get('/category', [
        'uses' => 'CategoryController@index',
        'as' => 'category'
    ]);
    Route::get('/category/create', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('/category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::post('/category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);


    //Routes for PostsController CRUD
    Route::get('/posts/create', [
        'uses' => 'PostsController@create',
        'as' => 'posts.create'
    ]);

    Route::post('/posts/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/post', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/posts/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'posts.delete'
    ]);
    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);

    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);
    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'posts.kill'
    ]);
    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'posts.restore'
    ]);

    Route::get('/posts/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'posts.edit'
    ]);
    Route::post('/posts/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'posts.update'
    ]);

    //Routes for the tags
    Route::get('/tag', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);
    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tags.create'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tags.edit'
    ]);
    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tags.update'
    ]);
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tags.delete'
    ]);
    Route::post('/tag/store',[
        'uses'=>'TagsController@store',
        'as'=>'tags.store'
    ]);
});
