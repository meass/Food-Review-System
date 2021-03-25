<?php
use  App\Http\Controllers\UserController;
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

Route::get('/', 'ShopController@index')->name('homepage');

Auth::routes();

Route::get('/redirect', 'FacebookController@redirect');
Route::get('/callback', 'FacebookController@callback');

Route::get('/register_as_shop_owner', function () {
    return view('auth.register_as_shop_owner');
})->name('register_as_shop_owner');

Route::get('/login_as_shop_owner', function () {
    return view('auth.login_as_shop_owner');
})->name('login_as_shop_owner');

Route::get('/{user}/shop/create', 'ShopController@create')->name('shop.create');
Route::post('/{user}/shop/store', 'ShopController@store')->name('shop.store');
Route::get('/shop/{shop}', 'ShopController@show')->name('shop.show');
Route::get('/shop/{shop}/edit', 'ShopController@edit')->name('shop.edit');
Route::post('/shop/{shop}/update', 'ShopController@update')->name('shop.update');

Route::get('/{user}', 'UserController@show')->name('user.show');
Route::get('/{user}/edit', 'UserController@edit')->name('user.edit');
Route::post('/{user}/update', 'UserController@update')->name('user.update');
Route::post('/{user}/update-avatar', 'UserController@update_avatar')->name('user.update_avatar');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/shop/{shop}/food-menu/index', 'FoodController@index')->name('food.index');
Route::get('/shop/{shop}/food-menu/create', 'FoodController@create')->name('food.create');
Route::post('/shop/{shop}/food-menu/store', 'FoodController@store')->name('food.store');
Route::get('/shop/{shop}/food-menu/{food}/edit', 'FoodController@edit')->name('food.edit');
Route::put('/shop/{shop}/food-menu/{food}/update', 'FoodController@update')->name('food.update');
Route::delete('/shop/{shop}/food-menu/{food}/destroy','FoodController@destroy')->name('food.destroy');

Route::post('/{shop}/review/store', 'ReviewController@store')->name('review.store');
Route::get('/shop/{shop}/review/index', 'ReviewController@index')->name('review.index');