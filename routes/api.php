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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*

Route::get('/company'   ,'CompanyController@get');
Route::post('/company'  ,'CompanyController@create');
Route::put('/company'   ,'CompanyController@update');
Route::delete('/company','CompanyController@delete');

Route::get('/company_unity'   ,'CompanyUnityController@get');
Route::post('/company_unity'  ,'CompanyUnityController@create');
Route::put('/company_unity'   ,'CompanyUnityController@update');
Route::delete('/company_unity','CompanyUnityController@delete');

Route::post('/unity_relationship','UnityRelationshipController@create');
Route::get('/unity_relationship','UnityRelationshipController@get');
Route::delete('/unity_relationship','UnityRelationshipController@delete');

*/

