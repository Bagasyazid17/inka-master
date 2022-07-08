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

Auth::routes();

Route::group(['middleware' => ['setLang', 'getMenu']], function(){
	Route::get('/', 'AppController@index')->name('app.index');
	
	Route::get('corporation', 'AppController@corporation')->name('app.corporation');
	Route::get('corporation/{id}', 'AppController@corporationShow')->name('app.corporation.show');

	Route::group(['prefix' => 'product'], function(){
		Route::get('list/{id}', 'AppController@productIndex')->name('app.product.index');
		Route::get('view/{id}', 'AppController@productShow')->name('app.product.show');
	});

	Route::get('berita', 'AppController@berita')->name('app.berita.index');
	Route::get('berita/{id}', 'AppController@beritaShow')->name('app.berita.show');
	
	Route::get('procurement', 'AppController@procurement')->name('app.procurement');
	Route::get('procurement', 'AppController@procurementShow')->name('app.procurement.show');
	
	Route::get('galeri', 'AppController@galeri')->name('app.galeri.index');
	Route::get('galeri/{id}', 'AppController@galeriShow')->name('app.galeri.show');
	
	Route::get('procurement', 'AppController@procurement')->name('app.procurement');
	Route::get('procurement/{id}', 'AppController@procurementShow')->name('app.procurement.show');

	Route::get('karir', 'AppController@karir')->name('app.karir.index');
	Route::get('karir/{id}', 'AppController@karirShow')->name('app.karir.show');

	Route::get('page/{id}', 'AppController@pageShow')->name('app.page.show');

	Route::get('contact', 'AppController@contact')->name('app.contact.index');
	Route::post('contact', 'AppController@contactStore')->name('app.contact.store');
	Route::get('sub-topik/{id}', 'AppController@subTopik')->name('app.contact.sub-topik');

	Route::get('lang/{id}', 'AppController@setLang')->name('app.lang');

	Route::get('error', function () {
    	return view('errors.under_construction');
	})->name('app.error');
});

Route::group(['prefix' => 'mobile'], function(){
	Route::get('berita/{id}', 'Api\MobileViewController@berita')->name('mobile.berita');
	Route::get('product/{id}', 'Api\MobileViewController@product')->name('mobile.product');
});

Route::get('document/download/{id}', 'Admin\KarirController@downloadDocument')->name('karir.download-document');
Route::get('/procurement/document/download/{id}', 'Admin\ProcurementController@downloadDocument')->name('procurement.download-document');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/', 'Admin\DashboardController@index')->name('dashboard.index');
		Route::get('check', 'Admin\DashboardController@check')->name('check');

		Route::group(['middleware' => ['getMenu']], function(){
			Route::get('preview/{id}', 'Admin\PreviewController@show')->name('preview.show');
			Route::post('preview', 'Admin\PreviewController@preview')->name('preview.store');
		});
		
		Route::resource('user', 'Admin\UserController');
		Route::get('password', 'Admin\UserController@passwordEdit')->name('password.edit');
		Route::patch('password', 'Admin\UserController@passwordUpdate')->name('password.update');

		Route::resource('home-setting', 'Admin\HomeSettingController', ['except' => ['create', 'update', 'show']]);

		Route::resource('slider-master', 'Admin\SliderMasterController');
		Route::group(['prefix' => 'slider-master'], function(){
			Route::resource('{sliderMasterId}/slider', 'Admin\SliderController');
			Route::group(['prefix' => '{id}/slider'], function(){	
				Route::patch('urutan/{sliderId}/{action}', 'Admin\SliderController@urutan')->name('slider.urutan');
			});
		});
				
		Route::resource('corporation', 'Admin\CorporationController');
		Route::group(['prefix' => 'corporation'], function(){
			Route::patch('status/{id}/{status}', 'Admin\CorporationController@status')->name('corporation.status');
			Route::patch('urutan/{id}/{action}', 'Admin\CorporationController@urutan')->name('corporation.urutan');
			Route::patch('urutan-child/{id}/{action}', 'Admin\CorporationController@urutanChild')->name('corporation.urutan-child');
		});

		Route::get('parent-corporation', 'Admin\CorporationController@parentCorporation')->name('corporation.parent');
		
		Route::group(['prefix' => 'products'], function(){	
			Route::resource('master-product', 'Admin\MasterProductController');
			Route::group(['prefix' => 'master-product'], function(){
				Route::patch('urutan/{id}/{action}', 'Admin\MasterProductController@urutan')->name('master-product.urutan');
			});
			
			Route::resource('category-product', 'Admin\CategoryProductController');
			Route::get('category-product/{id}/list', 'Admin\CategoryProductController@listCategory')->name('category-product.list');
			Route::resource('{isHidden}/product','Admin\ProductController');
			Route::get('{isHidden}/product-trash','Admin\ProductController@trash')->name('product.trash');
			Route::post('{isHidden}/product-trash/{id}','Admin\ProductController@restore')->name('product.restore');
			Route::delete('{isHidden}/product-trash/{id}','Admin\ProductController@permanentlyDelete')->name('product.permenent-delete');
			Route::delete('product/{id}/delete', 'Admin\ProductController@deleteProductGambar')->name('product.delete.gambar');
		});

		Route::resource('galeri', 'Admin\GaleriController');
		Route::group(['prefix' => 'galeri'], function(){	
			Route::resource('{galeriId}/media', 'Admin\MediaController');
			Route::group(['prefix' => '{id}/media'], function(){	
				Route::resource('{mediaId}/tag', 'Admin\MediaController');
			});
		});

		Route::resource('berita', 'Admin\BeritaController');
		Route::group(['prefix' => 'berita'], function(){
			Route::patch('status/{id}/{status}', 'Admin\BeritaController@status')->name('berita.status');
		});
		Route::get('berita-trash','Admin\BeritaController@trash')->name('berita.trash');
		Route::post('berita-trash/{id}','Admin\BeritaController@restore')->name('berita.restore');
		Route::delete('berita-trash/{id}','Admin\BeritaController@permanentlyDelete')->name('berita.permenent-delete');

		Route::group(['prefix' => 'procurement'], function(){	
			Route::resource('master-procurement', 'Admin\MasterProcurementController');
			Route::resource('procurement', 'Admin\ProcurementController');
			Route::group(['prefix' => 'procurement'], function(){
				Route::patch('status/{id}/{status}', 'Admin\ProcurementController@status')->name('procurement.status');
			});
			Route::resource('lelang', 'Admin\LelangController');
			Route::post('delete-document', 'Admin\ProcurementController@deleteDocument')->name('procurement.delete-document');
		});

		Route::resource('karir', 'Admin\KarirController');
		Route::group(['prefix' => 'karir'], function(){
			Route::patch('status/{id}/{status}', 'Admin\KarirController@status')->name('karir.status');
		});
		Route::post('delete-document', 'Admin\KarirController@deleteDocument')->name('karir.delete-document');

		Route::resource('broadcast', 'Admin\BroadcastController');

		Route::resource('menu', 'Admin\MenuController');
		Route::group(['prefix' => 'menu'], function(){
			Route::patch('urutan/{id}/{action}', 'Admin\MenuController@urutan')->name('menu.urutan');
			Route::resource('{menuId}/page', 'Admin\PageController');

			Route::patch('status/{id}/{status}', 'Admin\MenuController@status')->name('menu.status');
			Route::group(['prefix' => '{menuId}/page'], function(){
				Route::patch('status/{id}/{status}', 'Admin\PageController@status')->name('page.status');
			});
		});

		Route::resource('contact', 'Admin\ContactController',
			['only' => ['index', 'show', 'update', 'destroy']]);

		Route::resource('topik', 'Admin\TopikController');
		Route::group(['prefix' => 'topik'], function(){
			Route::resource('{topikId}/sub-topik', 'Admin\SubTopikController');
		});

		Route::resource('footer', 'Admin\FooterController');
		Route::group(['prefix' => 'footer'], function(){
			Route::resource('{footerId}/sub-footer', 'Admin\SubFooterController');
		});
	});
});