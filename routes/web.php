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

Route::get('/', 'UIController@index')->name('UI.index');
Route::get('/category/{id}-{slug}', 'UIController@showCategory')->name('UI.showCategory');
Route::get('/post/{id}-{slug}', 'UIController@showPost')->name('UI.showPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'manager', 'middleware' => 'auth'], function () {


    Route::get('dashbaord', 'DashboardController@index')->name('dashbaord');

    Route::get('userProfile', 'DashboardController@userProfile')->name('userProfile');
    Route::post('updateProfile', 'DashboardController@updateProfile')->name('updateProfile');

    // User
    Route::get('users', 'UserController@index')->name('user.index');
    Route::get('user/add', 'UserController@create')->name('user.add');
    Route::post('user/store', 'UserController@store')->name('user.store');
    Route::get('user/getUserData', 'UserController@getUserData')->name('user.getUserData');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('user/update/{id}', 'UserController@update')->name('user.update');
    Route::post('user/delete/{id}', 'UserController@destroy')->name('user.delete');


    // category
    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::get('category/add', 'CategoryController@create')->name('category.add');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::get('category/getCategoryData', 'CategoryController@getCategoryData')->name('category.getCategoryData');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::post('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    // Tag
    Route::get('tags', 'TagController@index')->name('tag.index');
    Route::get('tag/add', 'TagController@create')->name('tag.add');
    Route::post('tag/store', 'TagController@store')->name('tag.store');
    Route::get('tag/getTagData', 'TagController@getTagData')->name('tag.getTagData');
    Route::get('tag/edit/{id}', 'TagController@edit')->name('tag.edit');
    Route::post('tag/update/{id}', 'TagController@update')->name('tag.update');
    Route::post('tag/delete/{id}', 'TagController@destroy')->name('tag.delete');

    // Post
    Route::get('posts', 'PostController@index')->name('post.index');
    Route::get('post/add', 'PostController@create')->name('post.add');
    Route::post('post/store', 'PostController@store')->name('post.store');
    Route::get('post/getPostData', 'PostController@getPostData')->name('post.getPostData');
    Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('post/update/{id}', 'PostController@update')->name('post.update');
    Route::post('post/delete/{id}', 'PostController@destroy')->name('post.delete');






    // SettingController
    Route::get('setting/settings', 'SettingController@index')->name('setting.index');
    Route::get('setting/add', 'SettingController@create')->name('setting.add');
    Route::post('setting/store', 'SettingController@store')->name('setting.store');
    Route::get('setting/getSettingData', 'SettingController@getsettingData')->name('setting.getsettingData');
    Route::get('setting/edit/{id}', 'SettingController@edit')->name('setting.edit');
    Route::post('setting/update/{id}', 'SettingController@update')->name('setting.update');
});
