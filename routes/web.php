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

Route::namespace('App\Http\Controllers\user')->group(function(){
    Route::middleware(['guestuser:web'])->group(function(){
        Route::get('/', 'logincontroller@show_login')->name('user.login');
        Route::post('check-user-login', 'logincontroller@check_login')->name('check.user.login');  
    });
    
    Route::middleware(['authUser'])->group(function(){
        Route::get('/home', 'dashboardcontroller@dashboard')->name('user.dash.index');
        Route::get('/show_product/{id}', 'productcontroller@show_product')->name('show.product');
        Route::post('/addto_cart', 'productcontroller@add_to_card')->name('user.addto.cart');
        Route::get('/users_product', 'productcontroller@showUserProducts')->name('user.show.products');
        Route::get('logout', 'logincontroller@logout')->name('user.logout');
    });
});