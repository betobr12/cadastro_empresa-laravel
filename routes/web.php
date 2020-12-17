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


/*
Route::get('/', function () {
    $client = new Client([
        'base_uri' => 'https://www.receitaws.com.br/v1/cnpj/',
        'timeout'  => 2.0,
    ]);
    $response = $client->request('GET', '47960950000121');
     $consulta = $response->getBody()->getContents();
    return view('company.create',compact('consulta'));
});
*/






Route::get('/'   ,'SiteController@index')->name('index');

Route::resource('/company','CompanyController');
Route::get('/company'   ,'CompanyController@get')->name('company.list');

//Route::post('/company'  ,'CompanyController@create');
//Route::put('/company'   ,'CompanyController@update');
//Route::delete('/company','CompanyController@delete');

Route::resource('/company_unity'     ,'CompanyUnityController');
Route::get('/company_unity'     ,'CompanyUnityController@index')->name('company_unity.index');

Route::post('/unity_relationship'       ,'UnityRelationshipController@create');
Route::get('/unity_relationship'        ,'UnityRelationshipController@get');
Route::delete('/unity_relationship'     ,'UnityRelationshipController@delete');

