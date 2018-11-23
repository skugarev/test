<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'api',
    'namespace'  => 'Api',
    'prefix'     => 'v1',
], function () {
    Route::get('costs', 'CostsController@index');
    Route::get('costs/{cost}', 'CostsController@show');
    Route::get('categories', 'CategoriesController@index');
    Route::post('costs', 'CostsController@store');
    Route::put('costs/{cost}', 'CostsController@update');
    Route::delete('costs/{cost}', 'CostsController@delete');
});
