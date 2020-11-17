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
		});
	});
});