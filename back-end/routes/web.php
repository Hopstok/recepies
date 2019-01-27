<?php declare(strict_types=1);

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

// version of the api.
Route::prefix('api/v1')->group(function () {

    // ingredients endpoint
    Route::prefix('/ingredients')->group(function () {
        Route::get('', 'IngredientsController@index');
        Route::get('/{id}', 'IngredientsController@show');
        Route::post('', 'IngredientsController@create');
        Route::delete('/{id}', 'IngredientsController@delete');
    });
});
