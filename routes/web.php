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
Route::group(['prefix' => 'admin'], function () {
// Login Routes...
    Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' => 'AdminAuth\LoginController@login']);
    Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'admin.register', 'uses' => 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'admin.register.post', 'uses' => 'AdminAuth\RegisterController@register']);
});


//yang ini khusus test admin dashboard view

Route::get('/admin', function () {
    return view('admin/admin-dashboard/admin-home');
})->name('admin')->middleware('auth:admin');

Route::resource('/admin/surat-masuk', 'SuratMasukController',['only'=> ['index','create','store','edit','update','destroy']])->middleware('auth:admin');


Route::get('/admin/arsip', function () {
    return view('admin/admin-dashboard/admin-arsip');
})->middleware('auth:admin');

Route::get('admin/{admin}/edit', ['as' => 'admin.edit', 'uses' => 'UpdateAdminController@edit'])->middleware('auth:admin');
Route::put('admin/{admin}', ['as' => 'admin.update', 'uses' => 'UpdateAdminController@update']);

Route::post('/admin/notif', 'SuratKeluarController@notif')->middleware('auth:admin');
Route::post('/admin/markall', 'SuratKeluarController@markAllAsRead')->middleware('auth:admin');

Route::get('/admin/surat-masuk/search','SuratMasukController@search')->middleware('auth:admin');

//yang ini khusus test user dashboard view, nanti route diganti!!!!!
Route::get('/user', function () {
    return view('user-dashboard/user-home');
})->name('user.home')->middleware('auth');

Route::get('/user/surat-keluar', function () {
    return view('user-dashboard/user-surat-keluar');
})->middleware('auth');
Route::get('/user/surat-masuk', 'ApproveSuratController@suratDiterima')->middleware('auth');
Route::get('/user/disposisi-masuk', ['as' => 'user.disposisi-masuk', 'uses' => 'ApproveSuratController@disposisiMasuk'])->middleware('auth');
Route::get('user/{user}/edit', ['as' => 'user.edit', 'uses' => 'UpdateUserController@edit'])->middleware('auth');
Route::put('user/{user}', ['as' => 'user.update', 'uses' => 'UpdateUserController@update']);
Route::resource('/user/surat-keluar', 'SuratKeluarController', ['only'=> ['index','create','store']])->middleware('auth');
Route::post('/user/notif', 'ApproveSuratController@notif')->middleware('auth');
Route::post('/user/markall', 'ApproveSuratController@markAllAsRead')->middleware('auth');
Route::get('/user/surat-masuk/search','UserSearchController@searchSuratMasuk')->middleware('auth');
Route::get('/user/disposisi-masuk/search','UserSearchController@searchDisposisi')->middleware('auth');
Route::get('/user/surat-keluar/search','UserSearchController@searchSuratKeluar')->middleware('auth');

Route::get('/superadmin', function () {
    return view('superadmin/superadmin-dashboard/superadmin-home');
})->name('superadmin')->middleware('auth:superadmin');
Route::get('/superadmin/surat-masuk', 'ApproveSuratController@index')->middleware('auth:superadmin');
Route::put('/superadmin/surat-masuk/{surat_masuk}', ['as' => 'superadmin.surat-masuk.update', 'uses' => 'ApproveSuratController@update'])->middleware('auth:superadmin');
Route::get('/superadmin/surat-masuk/search','ApproveSuratController@search')->middleware('auth:superadmin');

Route::post('/superadmin/notif', 'SuratMasukController@notif')->middleware('auth:superadmin');
Route::post('/superadmin/markall', 'SuratMasukController@markAllAsRead')->middleware('auth:superadmin');

//Route::get('/superadmin/disposisi');

Route::get('superadmin/{superadmin}/edit', ['as' => 'superadmin.edit', 'uses' => 'UpdateSuperadminController@edit'])->middleware('auth:superadmin');
Route::put('superadmin/{superadmin}', ['as' => 'superadmin.update', 'uses' => 'UpdateSuperadminController@update']);

//SUPERADMIN ROUTE
Route::group(['prefix' => 'superadmin'], function () {
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

Route::resource('disposisi', 'DisposisiController')->middleware('auth:superadmin');
Route::get('file/{id}', 'DisposisiController@getFile');
Route::get('admin/arsip/{seksi}/detail', 'ArsipController@arsip')->name('arsip.detail')->middleware('auth:admin');

Route::get('/superadmin/arsip', function () {
    return view('superadmin/superadmin-dashboard/superadmin-arsip');
})->middleware('auth:superadmin');
Route::get('superadmin/arsip/detail', 'ArsipController@arsipSuperAdmin')->name('arsipSuperAdmin.detail')->middleware('auth:superadmin');
