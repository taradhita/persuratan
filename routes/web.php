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

Route::get('/', function () {
    return redirect()->route('login');
    //return view('welcome');
});

//ADMIN ROUTE
Route::group(['prefix' => 'admin'], function() {
// Login Routes...
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' => 'AdminAuth\LoginController@login']);
    Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'admin.register', 'uses' => 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'admin.register.post', 'uses' => 'AdminAuth\RegisterController@register']);

});


//yang ini khusus test admin dashboard view, nanti route diganti!!!!!

Route::get('/admin', function () {
    return view('admin/admin-dashboard/admin-home');
})->name('admin')->middleware('auth:admin');

Route::get('/admin/surat-masuk', function () {
    return view('admin/admin-dashboard/admin-surat-masuk');
})->middleware('auth:admin');
Route::get('/admin/arsip', function () {
    return view('admin/admin-dashboard/admin-arsip');
})->middleware('auth:admin');

//yang ini khusus test user dashboard view, nanti route diganti!!!!!
Route::get('/user', function () {
    return view('user-dashboard/user-home');
})->name('user.home')->middleware('auth');

Route::get('/user/surat-keluar', function () {
    return view('user-dashboard/user-surat-keluar');
})->middleware('auth');
Route::get('/user/surat-masuk', function () {
    return view('user-dashboard/user-surat-masuk');
})->middleware('auth');

Route::get('/superadmin', function () {
    return view('superadmin/superadmin-dashboard/superadmin-home');
})->name('superadmin')->middleware('auth:superadmin');

//SUPERADMIN ROUTE
Route::group(['prefix' => 'superadmin'], function() {
// Login Routes...
    Route::get('login', ['as' => 'superadmin.login', 'uses' => 'SuperadminAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'superadmin.login.post', 'uses' => 'SuperadminAuth\LoginController@login']);
    Route::post('logout', ['as' => 'superadmin.logout', 'uses' => 'SuperadminAuth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'superadmin.register', 'uses' => 'SuperadminAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'superadmin.register.post', 'uses' => 'SuperadminAuth\RegisterController@register']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');