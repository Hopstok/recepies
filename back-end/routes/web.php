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

Route::post('users/login',              'UsersController@login');
Route::post('users/passwordrecover',    'UsersController@passwordrecover');
Route::post('users/passwordreset',      'UsersController@passwordreset');
Route::resource('users',        'UsersController',          ['only' => ['index','store','show','update']]);
Route::resource('recipes',      'RecipesController',        ['only' => ['index','store','show','update']]);
Route::resource('ingredients',  'IngredientsController',    ['only' => ['index','show']]);


