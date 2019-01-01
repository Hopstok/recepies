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

    // user endpoint
    Route::prefix('/users')->group(function () {
        Route::get('', 'UsersController@index');
        Route::get('/{id}', 'UsersController@show');
        Route::post('', 'UsersController@create');
        Route::put('/{id}', 'UsersController@update');
        Route::delete('/{id}', 'UsersController@delete');
    });
    // recipe endpoint
    Route::prefix('/recipes')->group(function () {
        Route::get('', 'RecipesController@index');
        Route::get('/{id}', 'RecipesController@show');
        Route::post('', 'RecipesController@create');
        Route::put('/{id}', 'RecipesController@update');
        Route::delete('/{id}', 'RecipesController@delete');
    });
    // ingredients endpoint
    Route::prefix('/ingredients')->group(function () {
        Route::get('', 'IngredientsController@index');
        Route::get('/{id}', 'IngredientsController@show');
        Route::post('', 'IngredientsController@create');
        Route::delete('/{id}', 'IngredientsController@delete');
    });
    // procedures endpoint
    Route::prefix('/procedures')->group(function () {
        Route::get('', 'ProceduresController@index');
        Route::get('/{id}', 'ProceduresController@show');
        Route::post('', 'ProceduresController@create');
        Route::put('/{id}', 'ProceduresController@update');
        Route::delete('/{id}', 'ProceduresController@delete');
    });
});
