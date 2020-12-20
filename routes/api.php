<?php

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post("register", "API\AuthController@register")->name('register');
Route::post("login", "API\AuthController@login")->name('login');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get("profile", "API\AuthController@profile")->name('profile');
    Route::post("logout", "API\AuthController@logout")->name('logout');
});

Route::get("posts", "API\PostController@posts")->name('posts');
Route::get("postsSlider", "API\PostController@postsSlider")->name('postsSlider');
Route::get("categories", "API\CategoryController@categories")->name('categories');
