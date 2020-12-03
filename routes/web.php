<?php

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

Route::get('/', 'FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function()
{
	return view('admin.dashboard');
});

Route::get('/category', 'Admin\CategoryController@index')->name('category');
Route::post('/category-store', 'Admin\CategoryController@store')->name('category.store');
Route::get('/category-edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
Route::post('/category-update/{id}', 'Admin\CategoryController@update')->name('category.update');
Route::get('/category-delete/{id}', 'Admin\CategoryController@delete')->name('category.delete');
Route::get('/category-unactive/{id}', 'Admin\CategoryController@unactive')->name('category.unactive');
Route::get('/category-active/{id}', 'Admin\CategoryController@active')->name('category.active');

/////////////////BRAND//////////////////////
Route::get('/brand', 'Admin\BrandController@index')->name('brand');
Route::post('/brand-store', 'Admin\BrandController@store')->name('brand.store');
Route::get('/brand-edit/{id}', 'Admin\BrandController@edit')->name('brand.edit');
Route::post('/brand-update/{id}', 'Admin\BrandController@update')->name('brand.update');
Route::get('/brand-delete/{id}', 'Admin\BrandController@delete')->name('brand.delete');
Route::get('/brand-unactive/{id}', 'Admin\BrandController@unactive')->name('brand.unactive');
Route::get('/brand-active/{id}', 'Admin\BrandController@active')->name('brand.active');

///////////////////////////////Product/////////////////
Route::get('/product', 'Admin\ProductController@index')->name('product');
Route::get('/product-create', 'Admin\ProductController@create')->name('product.create');
Route::post('/product-store', 'Admin\ProductController@store')->name('product.store');
Route::get('/product-edit/{id}', 'Admin\ProductController@edit')->name('product.edit');
Route::post('/product-update/{id}', 'Admin\ProductController@update')->name('product.update');
Route::post('/product-imageupdate', 'Admin\ProductController@imageupdate')->name('product.imageUpdate');
Route::get('/product-delete/{id}', 'Admin\ProductController@delete')->name('product.delete');
Route::get('/product-unactive/{id}', 'Admin\ProductController@unactive')->name('product.unactive');
Route::get('/product-active/{id}', 'Admin\ProductController@active')->name('product.active');

////////////////////////Coupon//////////////////
Route::get('/coupon', 'Admin\CouponController@index')->name('coupon');
Route::post('/coupon-store', 'Admin\CouponController@store')->name('coupon.store');
Route::get('/coupon-edit/{id}', 'Admin\CouponController@edit')->name('coupon.edit');
Route::post('/coupon-update/{id}', 'Admin\CouponController@update')->name('coupon.update');
Route::get('/coupon-delete/{id}', 'Admin\CouponController@delete')->name('coupon.delete');
Route::get('/coupon-unactive/{id}', 'Admin\CouponController@unactive')->name('coupon.unactive');
Route::get('/coupon-active/{id}', 'Admin\CouponController@active')->name('coupon.active');

//////////////////////////////Card/////////////////////////////
Route::post('/add-cart/{id}', 'CardController@addToCard')->name('add.card');
Route::get('/shopping-cart', 'CardController@shopping_cart')->name('shopping.card');
Route::get('/shopping-delete/{id}', 'CardController@delete')->name('card.delete');
Route::post('/update-qty/{id}', 'CardController@updateQuantity')->name('qty.update');
Route::post('/coupon-apply', 'CardController@couponApply')->name('coupon.apply');

///////////////////Register////////////////
Route::get('/login-page', 'RegisterController@loginPage')->name('login.page');
Route::post('/customer-register', 'RegisterController@register')->name('customer.register');
Route::post('/customer-login', 'RegisterController@login')->name('customer.login');
Route::get('/customer-logout', 'RegisterController@logout')->name('customer.logout');
Route::get('/customer-checkout', 'RegisterController@checkout')->name('checkout');