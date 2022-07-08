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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('home-slider')
Route::group(['prefix' => 'v1'], function(){
	Route::group(['prefix' => 'product'], function(){
		Route::post('list', 'api\ApiController@productList');
		Route::post('master', 'api\ApiController@productMaster');
		Route::post('category', 'api\ApiController@productCategory');
		Route::post('per-category', 'api\ApiController@productPerCategory');
		Route::post('per-master', 'api\ApiController@productPerMaster');
		Route::post('per-master-v2', 'api\ApiController@productPerMasterV2');
		Route::post('show', 'api\ApiController@productShow');
	});

	Route::group(['prefix' => 'berita'], function(){
		Route::post('list', 'api\ApiController@beritaList');
		Route::post('show', 'api\ApiController@beritaShow');
	});	

	Route::group(['prefix' => 'galery'], function(){
		Route::post('list', 'api\ApiController@galeryList');
		Route::post('show', 'api\ApiController@galeryShow');
	});

	Route::post('contact', 'api\ApiController@contact');
	Route::post('topik', 'api\ApiController@topik');
	Route::post('sub-topik', 'api\ApiController@subTopik');
});
