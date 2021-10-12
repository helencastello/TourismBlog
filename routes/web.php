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
Route::group(['prefix' => '/'], function () {
    # Home Page
    Route::get('/', ['as' => 'home.page', 'uses' => 'UserController@homePage']);

    # Login
    Route::group(['prefix' => '/login'], function () {
        # Login Page
        Route::get('/', ['as' => 'login.page', 'uses' => 'AuthController@loginPage']);
        # Login
        Route::post('/', ['as' => 'login', 'uses' => 'AuthController@login']);
    });

    # Register
    Route::group(['prefix' => '/register'], function () {
        # Register Page
        Route::get('/', ['as' => 'register.page', 'uses' => 'AuthController@registerPage']);
        # Register
        Route::post('/', ['as' => 'register', 'uses' => 'AuthController@register']);
    });

    # Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    # Profile
    Route::group(['prefix' => '/profile'], function () {
        # Profile Page
        Route::get('/', ['as' => 'profile.page', 'uses' => 'UserController@profilePage']);
        # Update Profile
        Route::post('/', ['as' => 'profile', 'uses' => 'UserController@updateProfile']);
    });

    # Blog
    Route::group(['prefix' => '/blog'], function () {
        # Blog Page
        Route::get('/', ['as' => 'blog.page', 'uses' => 'ArticleController@blogPage']);
        # Get Blog Detail
        Route::get('/{articleId}/detail', ['as' => 'blog.get.detail', 'uses' => 'ArticleController@getBlogDetail'])->where('articleId', '[0-9]+');
        # Add Blog Page
        Route::get('/add', ['as' => 'blog.add.page', 'uses' => 'ArticleController@addBlogPage']);
        # Add Blog
        Route::post('/add', ['as' => 'blog.add', 'uses' => 'ArticleController@addBlog']);
        # Update Blog
        Route::post('/update/{articleId}', ['as' => 'blog.update', 'uses' => 'ArticleController@updateBlog'])->where('articleId', '[0-9]+');
        # Delete Blog
        Route::delete('/delete/{articleId}', ['as' => 'blog.delete', 'uses' => 'ArticleController@deleteBlog'])->where('articleId', '[0-9]+');
        # Get All Blog by Category
        Route::get('/category/{categoryId}', ['as' => 'get.page.category', 'uses' => 'ArticleController@getBlogByCategory']);
    });

    # Category
    Route::group(['prefix' => '/category'], function () {
        # Category Page
        Route::get('/', ['as' => 'category.page', 'uses' => 'CategoryController@categoryPage']);
        # Get Category Detail
        Route::get('/{categoryId}', ['as' => 'category.get.detail', 'uses' => 'CategoryController@getCategoryDetail'])->where('categoryId', '[0-9]+');
        # Add Category Page
        Route::get('/add', ['as' => 'category.add.page', 'uses' => 'CategoryController@addCategoryPage']);
        # Add Category
        Route::post('/add', ['as' => 'category.add', 'uses' => 'CategoryController@addCategory']);
        # Update Category
        Route::post('/update/{categoryId}', ['as' => 'category.update', 'uses' => 'CategoryController@updateCategory'])->where('categoryId', '[0-9]+');
        # Delete Category
        Route::delete('/delete/{categoryId}', ['as' => 'category.delete', 'uses' => 'CategoryController@deleteCategory'])->where('categoryId', '[0-9]+');
    });

    # About Us
    Route::get('/about-us', ['as' => 'about.us', 'uses' => 'UserController@aboutUsPage']);

    # User
    Route::group(['prefix' => '/user'], function () {
        # User Page
        Route::get('/manage', ['as' => 'manage.user', 'uses' => 'UserController@manageUser']);
        # Delete User
        Route::delete('/delete/{userId}', ['as' => 'user.delete', 'uses' => 'UserController@deleteUser'])->where('userId', '[0-9]+');
        # Get User Blog
        Route::get('/{userId}/blog', ['as' => 'manage.user.blog', 'uses' => 'ArticleController@getUserBlogPage'])->where('userId', '[0-9]+');
    });
});
