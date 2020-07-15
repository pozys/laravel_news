<?php

use \Admin\CategoryController;
use \Admin\NewsController;
use \Admin\FeedbackController;
use \Admin\RequestsController;
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
        'prefix' => 'admin'
    ],
    function () {
        Route::get('/index', 'AdminController@index')->name('admin.index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/info_requests', RequestsController::class);
    }
);


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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
