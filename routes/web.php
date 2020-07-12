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

Route::get('/', 'MainController@WelcomePage')->name('index');

Route::get('/about', function () {
    return 'Important information about our project';
});

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.'
    ],
    function () {
        Route::get('/index', 'AdminController@index')->name('index');
        Route::match(['get', 'post'], '/addCategory', 'AdminController@addCategory')->name('addCategory');
        Route::match(['get', 'post'], '/addNews', 'AdminController@addNews')->name('addNews');
        Route::match(['get', 'post'], '/updateNews', 'AdminController@updateNews')->name('updateNews');
        Route::match(['get', 'post'], '/updateNews/{news}', 'AdminController@updateNewsById')->name('updateNewsById');
        Route::get('/deleteNews/{news}', 'AdminController@deleteNews')->name('deleteNews');
        Route::match(['get', 'post'], '/updateCategory', 'AdminController@updateCategory')->name('updateCategory');
        Route::get('/deleteCategory/{category}', 'AdminController@deleteCategory')->name('deleteCategory');
        Route::match(['get', 'post'], '/updateCategoryById/{category}', 'AdminController@updateCategoryById')->name('updateCategoryById');
        Route::get('/deleteFeedback', 'AdminController@deleteFeedback')->name('deleteFeedback');
        Route::match(['get', 'delete'], '/deleteFeedbackById/{feedback}', 'AdminController@deleteFeedbackById')->name('deleteFeedbackById');
        Route::get('/deleteRequest', 'AdminController@deleteRequest')->name('deleteRequest');
        Route::match(['get', 'delete'], '/deleteRequestById/{appRequest}', 'AdminController@deleteRequestById')->name('deleteRequestById');
    }
);

Route::match(['get', 'post'], '/feedback', 'FeedBackController@addFeedback')->name('addFeedback');
Route::match(['get', 'post'], '/request', 'RequestController@addRequest')->name('addRequest');

Route::group(
    [
        'prefix' => 'categories',
        'as' => 'categories.'
    ],
    function () {
        Route::get('/{id}', 'NewsController@getNewsByCategoryId')->name('getNewsByCategoryId');
    }
);

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ],
    function () {
        Route::get('/{news}', 'NewsController@getNewsById')->name('getNewsById');
    }
);

Route::group(
    [
        'prefix' => 'auth',
        'as' => 'auth.'
    ],
    function () {
        Route::get('/', 'AuthorizationController@main')->name('auth_main');
        Route::get('/check', 'AuthorizationController@authorization')->name('authorization');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
