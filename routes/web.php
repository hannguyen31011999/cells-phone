<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/','frontend\PageController@index');

Route::get('/modal-detail-product','frontend\PageController@detailProduct');

Route::get('/change-color','frontend\PageController@changeColorProduct');

// Route logout
Route::get('/logout','frontend\LoginController@Logout');


// Route login admin
Route::get('/login',function(){
	return view('backend.login.index_login');
});
Route::post('/login','frontend\LoginController@Login');

// List route admin
Route::group(['prefix'=>'admin','middleware'=>'CheckAdminLogin','namespace'=>'backend'],function(){

	// Route dashboard
	Route::get('/dashboard',function(){
		return view('backend.dashboard.index');
	});

	// Route group categories
	Route::group(['prefix'=>'categories'],function(){
		Route::name('categories.')->group(function(){
			Route::get('/list','CategoriesController@index');
			Route::get('/create','CategoriesController@create');
			Route::post('/create','CategoriesController@store')->name('create');
			Route::get('/update/{id}','CategoriesController@edit');
			Route::post('/update/{id}','CategoriesController@update')->name('update');
			Route::get('/delete/{id}','CategoriesController@destroy')->name('delete');
		});
	});

	Route::group(['prefix'=>'product'],function(){
		// route product
		Route::name('product.')->group(function(){
			Route::get('/list','ProductController@index')->name('list');
			Route::get('/create','ProductController@create');
			Route::post('/create','ProductController@store')->name('create');
			Route::get('/edit/{id}','ProductController@edit');
			Route::post('/edit/{id}','ProductController@update')->name('update');
			Route::get('/delete/{id}','ProductController@destroy')->name('delete');
		});

		// route product_detail
		Route::name('product_detail.')->group(function(){
			Route::get('{id}/detail/list','ProductDetailController@index')->name('list');
			Route::get('{id}/detail/create','ProductDetailController@create')->name('create');
			Route::post('{id}/detail/create','ProductDetailController@store')->name('store');
			Route::get('{id}/detail/edit/{idDetail}','ProductDetailController@edit')->name('edit');
			Route::post('{id}/detail/edit/{idDetail}','ProductDetailController@update')->name('update');
			Route::get('{id}/delete/edit/{idDetail}','ProductDetailController@destroy')->name('delete');
		});

		// route attribute product
		Route::name('attribute_product.')->group(function(){
			Route::get('{id}/attribute/list','AttributeProductController@index')->name('list');
			Route::get('{id}/attribute/create','AttributeProductController@create')->name('create');
			Route::post('{id}/attribute/create','AttributeProductController@store')->name('store');
			Route::get('{id}/attribute/edit/{idAttribute}','AttributeProductController@edit')->name('edit');
			Route::post('{id}/attribute/edit/{idAttribute}','AttributeProductController@update')->name('update');
			Route::get('{id}/attribute/delete/{idAttribute}','AttributeProductController@destroy')->name('delete');
		});
	});

	// route discount
	Route::group(['prefix'=>'discount'],function(){
		Route::name('discount.')->group(function(){
			Route::get('/list','DiscountController@index')->name('list');
			Route::get('/create','DiscountController@create')->name('store');
			Route::post('/create','DiscountController@store')->name('create');
			Route::get('/edit/{id}','DiscountController@edit')->name('edit');
			Route::post('/edit/{id}','DiscountController@update')->name('update');
			Route::get('/delete/{id}','DiscountController@destroy')->name('delete');
		});
	});
});