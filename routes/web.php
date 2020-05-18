<?php

use Illuminate\Support\Facades\Route;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test','UserController@test');
Route::get('/list','UserController@list')->name('assetList');
Route::get('/deselect','AssetController@reset')->name('reset');
Route::post('/save','AssetController@saveall')->name('save');

Route::get('/repairList','UserController@repairlist')->name('repairList');

Route::get('/replaceList','UserController@replacelist')->name('replaceList');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/role/index','rolesController@index')->name('indexRole');
Route::get('/admin/role/create','rolesController@create')->name('createRole');
Route::post('/admin/role/store','rolesController@store')->name('storeRole');
Route::get('/admin/role/edit/{id}','rolesController@edit')->name('editRole');
Route::post('/admin/role/update/{id}','rolesController@update')->name('updateRole');
Route::get('/admin/role/delete/{id}','rolesController@destroy')->name('deleteRole');

Route::get('/asset/index','AssetController@index')->name('indexAsset');
Route::get('/asset/create','AssetController@create')->name('createAsset');
Route::post('/asset/store','AssetController@store')->name('storeAsset');
Route::get('/asset/edit/{id}','AssetController@edit')->name('editAsset');
Route::post('/asset/update/{id}','AssetController@update')->name('updateAsset');
Route::get('/asset/delete/{id}','AssetController@destroy')->name('deleteAsset');

Route::get('/block/index','blocksController@index')->name('indexBlock');
Route::get('/block/create','blocksController@create')->name('createBlock');
Route::post('/block/store','blocksController@store')->name('storeBlock');
Route::get('/block/edit/{id}','blocksController@edit')->name('editBlock');
Route::get('/block/update/{id}','blocksController@update')->name('updateBlock');
Route::get('/block/delete/{id}','blocksController@destroy')->name('deleteBlock');

Route::get('/bureau/index','bureauController@index')->name('indexBureau');
Route::get('/bureau/create','bureauController@create')->name('createBureau');
Route::post('/bureau/store','bureauController@store')->name('storeBureau');
Route::get('/bureau/edit/{id}','bureauController@edit')->name('editBureau');
Route::get('/bureau/update/{id}','bureauController@update')->name('updateBureau');
Route::get('/bureau/delete/{id}','bureauController@destroy')->name('deleteBureau');

Route::get('/admin/user/create','UserController@create')->name('createUser');
Route::post('/admin/user/store','UserController@store')->name('storeUser');
Route::get('/admin/user/edit/{id}','UserController@edit')->name('editUser');
Route::post('/admin/user/update/{id}','UserController@update')->name('updateUser');
Route::get('/admin/user/delete/{id}','UserController@delete')->name('deleteUser');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

   
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','rolesController');
	Route::resource('users','UserController');
	Route::resource('assets', 'AssetController');
});
});

