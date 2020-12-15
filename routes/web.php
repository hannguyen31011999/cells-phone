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

Route::group(['namespace'=>'frontend'],function(){

	// index 
	Route::get('/','PageController@index')->name('home');

	Route::get('/modal-detail-product','PageController@detailProduct');

	Route::get('/change-color','PageController@changeColorProduct');

	// cart
	Route::get('/add-cart','CartController@addCart');

	Route::get('/update-cart','CartController@updateCart');

	Route::get('/delete-cart','CartController@deleteCart');

	Route::get('/shopping-cart','CartController@index');

	// Wish
	Route::get('/add-wishlist','WishController@addWish');

	Route::get('/wish-list','WishController@index');

	Route::get('change-wishlist','WishController@changeAttribute');
	
	// Compare
	Route::get('/compare','CompareController@index');

	Route::get('/compare/{id}','CompareController@destroy');

	// Route logout
	Route::get('/logout','LoginController@Logout')->name('logout');

	// login admin
	Route::post('/login','LoginController@Login');

	// product detail
	Route::get('/product/{name}','ProductDetailController@index')->name('viewProductDetail');
});

Route::group(['prefix'=>'account','namespace'=>'frontend'],function(){
	// register
	Route::get('/register',function(){
		return view('frontend.register.page_register');
	});


	Route::post('/register','RegisterController@Register')->name('register');

	// confirm account
	Route::get('/confirm','RegisterController@confirmAccount');

	Route::post('/confirm','RegisterController@Confirm')->name('confirm');

	// login
	Route::get('/login',function(){
		return view('frontend.login.page_login');
	});

	Route::post('/login','LoginController@Login')->name('loginUser');

	Route::group(['middleware'=>'CheckLogin'],function(){
		// profile
		Route::get('/profile',function(){
			return view('frontend.profile.page_profile');
		});

		Route::post('/profile','ProfileController@updateProfile')->name('updateProfile');

		// change password
		Route::get('/change-password',function(){
			return view('frontend.profile.page_changepassword');
		});

		Route::post('/change-password','ProfileController@updatePassword')->name('updatePassword');

		// purchase
		Route::get('/purchase','PurchaseController@index');

		// messenger
		Route::get('/purchase','MessengerController@index');
	});

	// recovery
	Route::get('/recovery',function(){
		return view('frontend.login.recovery');
	});

	Route::post('/recovery','LoginController@mailResetPassword')->name('resetPassword');

	// reset password
	Route::get('/reset','LoginController@viewRecovery');

	Route::post('/reset','LoginController@confirmReset');
});


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