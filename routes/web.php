<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyUnityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UnityRelationshipController;
use Illuminate\Http\Request;
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



Route::get('/', [SiteController::class, 'index'])->name('index');

Route::resource('/company', CompanyController::class);
Route::get('/company', [CompanyController::class, 'get'])->name('company.list');

Route::resource('/company_unity', CompanyUnityController::class);
Route::get('/company_unity', [CompanyUnityController::class,'index'])->name('company_unity.index');

Route::resource('/unity_relationship', UnityRelationshipController::class);
Route::get('/unity_relationship', [UnityRelationshipController::class, 'get'])->name('unity_relationship.list');
