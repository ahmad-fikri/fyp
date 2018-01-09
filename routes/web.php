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

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

//Order
Route::get('/order/create', 'OrdersController@create');
Route::post('/order/create', 'OrdersController@store');

Route::get('/allorder', 'OrdersController@showall');
Route::get('/completed', 'OrdersController@completed');

Route::get('/order', 'OrdersController@index');
Route::get('/order/{id}', 'OrdersController@show');
Route::get('/order/{id}/edit','OrdersController@edit');
Route::post('/order/{id}/edit','OrdersController@update');
Route::post('/order/{id}/delete','OrdersController@destroy');
Route::get('/users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/users/register', 'Auth\RegisterController@register');
Route::get('/users/logout', 'Auth\LoginController@logout');

Route::get('/users/login', 'Auth\LoginController@showLoginForm');
Route::post('/users/login', 'Auth\LoginController@login');

Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'admin']], function()
{
	Route::get('/order', 'OrdersController@index');
}
);
Route::get('/upload', 'UploadsController@index');
Route::post('/upload/uploadFiles', 'UploadsController@multiple_upload');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/** Payment **/
Route::get('/pay', 'OrdersController@pay');

Route::post('/charge10', 'OrdersController@charge10');
Route::post('/charge20', 'OrdersController@charge20');
Route::post('/charge50', 'OrdersController@charge50');

Route::post('/charge', 'OrdersController@charge');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


/** Report **/
Route::get('/report', 'ReportController@index');
Route::get('/report/paid', 'ReportController@paid');
Route::get('/report/product', 'ReportController@product');
Route::get('/report/sales', 'ReportController@sales');


/** Prediction **/
Route::get('/kpi','ReportController@prediction');


/** Mark Print as Done **/
Route::get('/{id}/done', 'OrdersController@mark_as_done');