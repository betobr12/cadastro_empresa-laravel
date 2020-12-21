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

Route::get('/'   ,'SiteController@index')->name('index');

Route::resource('/company','CompanyController');
Route::get('/company'   ,'CompanyController@get')->name('company.list');

Route::resource('/company_unity'     ,'CompanyUnityController');
Route::get('/company_unity'     ,'CompanyUnityController@index')->name('company_unity.index');

Route::resource('/unity_relationship'       ,'UnityRelationshipController');
Route::get('/unity_relationship'            ,'UnityRelationshipController@get')->name('unity_relationship.list');


