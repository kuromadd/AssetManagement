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
Route::get('/test2','UserController@test2');
Route::get('/test3','UserController@test3');
Route::get('/list','UserController@list')->name('assetList');
Route::get('/deselect/{id}','AssetController@reset')->name('reset');
Route::post('/save','AssetController@saveall')->name('save');

Route::get('/repairList','UserController@repairlist')->name('repairList');

Route::get('/replaceList','UserController@replacelist')->name('replaceList');

Route::get('/permissionM','UserController@modelsPer')->name('indexPM');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/role/index','rolesController@index')->name('indexRole');
Route::get('/admin/role/create','rolesController@create')->name('createRole');
Route::post('/admin/role/store','rolesController@store')->name('storeRole');
Route::get('/admin/role/edit/{id}','rolesController@edit')->name('editRole');
Route::post('/admin/role/update/{id}','rolesController@update')->name('updateRole');
Route::get('/admin/role/delete/{id}','rolesController@destroy')->name('deleteRole');

Route::get('/admin/User/index','UserController@index')->name('indexUser');
Route::get('/admin/User/create','UserController@create')->name('createUser');
Route::post('/admin/User/store','UserController@store')->name('storeUser');
Route::get('/admin/User/edit/{id}','UserController@edit')->name('editUser');
Route::post('/admin/User/update/{id}','UserController@update')->name('updateUser');
Route::get('/admin/User/delete/{id}','UserController@destroy')->name('deleteUser');
Route::get('/admin/user/show/{id}','UserController@show')->name('showUser');

Route::post('/admin/role/updateAll','rolesController@updateAll')->name('updateAll');
Route::post('/admin/role/updateAllper','UserController@updateAll')->name('updateAllper');

Route::get('/asset/index','AssetController@index')->name('indexAsset');
Route::get('/asset/create/{qr}','AssetController@create')->name('createAsset');
Route::post('/asset/store','AssetController@store')->name('storeAsset');
Route::get('/asset/show/{id}','AssetController@show')->name('showAsset');
Route::get('/asset/edit/{id}','AssetController@edit')->name('editAsset');
Route::post('/asset/update/{id}','AssetController@update')->name('updateAsset');
Route::get('/asset/delete/{id}','AssetController@destroy')->name('deleteAsset');
Route::get('/asset/replace/{id}','AssetController@replace')->name('replaceAsset');
Route::get('/asset/found/{id}','AssetController@found')->name('foudAsset');

Route::get('/Inventaire/index','InventaireController@index')->name('indexInventaire');
Route::get('/Inventaire/create','InventaireController@create')->name('createInventaire');
Route::post('/Inventaire/store','InventaireController@store')->name('storeInventaire');
Route::get('/Inventaire/edit/{id}','InventaireController@edit')->name('editInventaire');
Route::post('/Inventaire/update/{id}','InventaireController@update')->name('updateInventaire');
Route::get('/Inventaire/delete/{id}','InventaireController@destroy')->name('deleteInventaire');

Route::get('/reparation/index','ReparationController@index')->name('indexReparation');
Route::get('/reparation/create','ReparationController@create')->name('createReparation');
Route::get('/reparation/show/{id}','reparationController@show')->name('showReparation');
Route::post('/reparation/store','ReparationController@store')->name('storeReparation');
Route::get('/reparation/edit/{id}','ReparationController@edit')->name('editReparation');
Route::post('/reparation/update/{id}','ReparationController@update')->name('updateReparation');
Route::get('/reparation/delete/{id}','ReparationController@destroy')->name('deleteReparation');

Route::get('/block/index','blocksController@index')->name('indexBlock');
Route::get('/block/create','blocksController@create')->name('createBlock');
Route::post('/block/store','blocksController@store')->name('storeBlock');
Route::get('/block/show/{id}','BlocksController@show')->name('showBlock');
Route::get('/block/edit/{id}','blocksController@edit')->name('editBlock');
Route::post('/block/update/{id}','blocksController@update')->name('updateBlock');
Route::get('/block/delete/{id}','blocksController@destroy')->name('deleteBlock');

Route::get('/bureau/index','bureauController@index')->name('indexBureau');
Route::get('/bureau/create','bureauController@create')->name('createBureau');
Route::post('/bureau/store','bureauController@store')->name('storeBureau');
Route::post('/bureau/storeAddedAssets/{id}','bureauController@storeAddedAssets')->name('storeAddedAssets'); //
Route::get('/bureau/show/{id}','bureauController@show')->name('showBureau');
Route::get('/bureau/edit/{id}','bureauController@edit')->name('editBureau');
Route::post('/bureau/update/{id}','bureauController@update')->name('updateBureau');
Route::post('/bureau/save/{id}','bureauController@saveAsset')->name('saveAssets');
Route::get('/bureau/delete/{id}','bureauController@destroy')->name('deleteBureau');

Route::get('/mission/index','missionController@index')->name('indexMission');
Route::get('/mission/create/{id}','missionController@create')->name('createMission');
Route::post('/mission/store','missionController@store')->name('storeMission');
Route::get('/mission/show/{id}','missionController@show')->name('showMission');
Route::get('/mission/edit/{id}','missionController@edit')->name('editMission');
Route::post('/mission/update/{id}','missionController@update')->name('updateMission');
Route::get('/mission/delete/{id}','missionController@destroy')->name('deleteMission');
Route::get('/mission/complete/{id}','missionController@complete')->name('completeMission');

Route::get('/Fournisseur/index','FournisseurController@index')->name('indexFournisseur');
Route::get('/Fournisseur/create','FournisseurController@create')->name('createFournisseur');
Route::post('/Fournisseur/store','FournisseurController@store')->name('storeFournisseur');
Route::get('/Fournisseur/show/{id}','FournisseurController@show')->name('showFournisseur');
Route::get('/Fournisseur/edit/{id}','FournisseurController@edit')->name('editFournisseur');
Route::post('/Fournisseur/update/{id}','FournisseurController@update')->name('updateFournisseur');
Route::get('/Fournisseur/delete/{id}','FournisseurController@destroy')->name('deleteFournisseur');

Route::get('/Transfert/index','TransfertController@index')->name('indexTransfert');
Route::get('/Transfert/create/{id}','TransfertController@create')->name('createTransfert');
Route::post('/Transfert/store','TransfertController@store')->name('storeTransfert');
Route::get('/Transfert/show/{id}','TransfertController@show')->name('showTransfert');
Route::get('/Transfert/delete/{id}','TransfertController@destroy')->name('deleteTransfert');

Route::get('/findEtage','bureauController@findEtage');
Route::get('/Etage','TransfertController@Etage');
Route::get('/Bureau','TransfertController@Bureau');
Route::get('/getAsset','TransfertController@getAsset');

Route::get('/EtageInv','InventaireController@EtageInv');
Route::get('/BureauInvCheck','InventaireController@BureauInvCheck');
Route::get('/BureauInvUnCheck','InventaireController@BureauInvUnCheck');
Route::get('/AssetInv','InventaireController@AssetInv');
Route::get('/saveInv','inventaireController@saveInv');

Route::post('/admin/user/update/{id}','UserController@update')->name('updateUser');

Route::group(['middleware' => 'auth'], function () {

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

   
Route::group(['middleware' => ['auth']], function() {
	
    Route::resource('roles','rolesController');
	Route::resource('assets', 'AssetController');
	Route::resource('inventaires', 'InventaireController');

});
});

Route::get('/tinv', function () {
    return view('inventaire.test');
});
Route::get('/tinv2', function () {
    return view('inventaire.test2');
});

Route::get('/q', function () {
    return view('test.index');
});

Route::get('/qr', function () {
    return view('qr.qrh');
});
Route::get('/scan','assetController@scan')->name('scan');
Route::get('/exist/{qrcode}','assetController@exist')->name('exist');
Route::get('/existInv/{qrcode}','assetController@existInv')->name('existInv');

Route::get('/checkqr/{qrcode}','auth\LoginController@checkQR')->name('qrcheck');

Route::get('/checkfine','inventaireController@checkfine')->name('checkfine');
Route::get('/checkdamaged','inventaireController@checkdamaged')->name('checkdamaged');
Route::get('/checklost','inventaireController@checklost')->name('checklost');
Route::get('/uncheckAsset','inventaireController@uncheckAsset')->name('uncheckAsset');

Route::get('/getbureau/{id}/{etage}','inventaireController@BureauInv')->name('getbureau');
Route::get('/getasset/{id}','inventaireController@assetInv')->name('getA');


