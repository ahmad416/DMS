<?php

use Illuminate\Http\Request;

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
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
// Route::group([
//     'middleware'=> 'auth:api'
// ], function($router){
//     Route::get('/users', 'UserController@allUsers');
// Route::get('/user/{id}', 'UserController@allUsers');
// });
Route::get('/users', 'UserController@allUsers')->middleware('auth:api');
Route::get('/user/{id}', 'UserController@allUsers')->middleware('auth:api');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/departments', 'DepartmentController@index');
Route::post('/department/create', 'DepartmentController@store');

Route::get('/desiginations', 'DesiginationController@index');
Route::post('/desigination/create', 'DesiginationController@store');
