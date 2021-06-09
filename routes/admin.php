<?php 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('App\Http\Controllers\Admin')->group(function(){
    
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/login', 'dashboard_controller@show_login')->name('admin.show.login');
        Route::post('check_admin_login', 'dashboard_controller@check_admin_login')->name('admin_login');
    });
    
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin' ]
        ], function(){ 
            Route::get('/', 'dashboard_controller@index')->name('admin.dashboard');

            Route::resource('category', 'categoryController');
         
            //   users by AJAX //
            Route::get('users/index',    'usersController@index')->name('users.index');
            Route::get('users/create',   'usersController@create')->name('users.create');
            Route::post('users/store',   'usersController@store')->name('users.store');
            Route::post('users/destroy', 'usersController@destroy')->name('users.destroy');
            Route::get('users/edit/{id}','usersController@edit')->name('users.edit');
            Route::post('users/update/', 'usersController@update')->name('users.update');
            // ----------- //

            Route::resource('admin', 'admincontroller');
            
            Route::get('logoutt', 'dashboard_controller@logout')->name('admin.logout');
        });

});

