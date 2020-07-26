<?php

use \Admin\CategoryController;
use \Admin\NewsController;
use \Admin\FeedbackController;
use \Admin\RequestsController;
use \Admin\UsersController;
use \Admin\ResourcesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
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

Route::resource('/admin/info_requests', RequestsController::class)->only(['create', 'store', 'show']);
Route::resource('/admin/feedback', FeedbackController::class)->only(['create', 'store', 'show']);

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', 'Account\IndexController@index')->name('account');
    Route::get('/logout', function () {
        Auth::logout();

        return redirect(Route('index'));
    });

    Route::group(
        [
            'prefix' => 'admin',
            'middleware' => 'admin'
        ],
        function () {
            Route::get('/index', 'AdminController@index')->name('admin.index');
            Route::resource('/users', UsersController::class);
            Route::resource('/categories', CategoryController::class)->except(['destroy']);
            Route::resource('/news', NewsController::class)->except(['destroy']);
            Route::resource('/feedback', FeedbackController::class)->except(['create', 'store', 'show']);
            Route::resource('/info_requests', RequestsController::class)->except(['create', 'store', 'show']);
            Route::get('/news/{news}', 'Admin\NewsController@destroy')->name('news.destroy');
            Route::get('/categories/{category}', 'Admin\CategoryController@destroy')->name('categories.destroy');
            Route::resource('/resources', ResourcesController::class)->except(['destroy']);
            Route::get('/resources/{resource}', 'Admin\ResourcesController@destroy')->name('resources.destroy');
        }
    );

    Route::group(
        [
            'prefix' => 'news_loading',
            'middleware' => 'admin'
        ],
        function () {
            Route::get('/yandex', 'Admin\ParserController@parseYandex')->name('parseYandex');
        }
    );
});

Route::group(
    [
        'prefix' => 'auth',
        'as' => 'auth.'
    ],
    function () {
        Route::get('/', 'AuthorizationController@main')->name('auth_main');
        Route::get('/check', 'AuthorizationController@authorization')->name('authorization');
        Route::get('/fb/response', 'LoginController@responseFB')->name('fbResponse');
        Route::get('/fb', 'LoginController@loginFB')->name('fbLogin');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

