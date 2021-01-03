<?php

use App\Http\Controllers\bonEnvoiController;
use App\Http\Controllers\bonSortieController;
use App\Http\Controllers\factureProformaController;
use App\Http\Controllers\ordonnancePaiementController;
use App\Http\Controllers\oronnancePaiementController;
use App\Http\Controllers\priseEnchargeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//here is for bon de sortie
Route::get('/bonsortie/index',[bonSortieController::class,'index'])->name('bonsortieIndex');
Route::post('/bonsortie/store',[bonSortieController::class,'store'])->name('bonsortieStore');
Route::get('/bonsortie/create',[bonSortieController::class,'create'])->name('bonsortieCreate');
Route::get('/bonsortie/edit/{id}]',[bonSortieController::class,'edit'])->name('bonsortieEdit');
Route::get('/bonsortie/show/{id}',[bonSortieController::class,'show'])->name('bonsortieShow');
Route::post('/bonsortie/update/{id}',[bonSortieController::class,'update'])->name('bonsortieUpate');
Route::get('/bonsortie/search',[bonSortieController::class,'search'])->name('bonsortieSearch');

//here is for bon d'envois
Route::get('/bonenvoi/index',[bonEnvoiController::class,'index'])->name('bonenvoiIndex');
Route::post('/bonenvoi/store',[bonEnvoiController::class,'store'])->name('bonenvoiStore');
Route::get('/bonenvoi/create',[bonEnvoiController::class,'create'])->name('bonenvoiCreate');
Route::get('/bonenvoi/edit/{id}]',[bonEnvoiController::class,'edit'])->name('bonenvoiEdit');
Route::get('/bonenvoi/show/{id}',[bonEnvoiController::class,'show'])->name('bonenvoiShow');
Route::post('/bonenvoi/update/{id}',[bonEnvoiController::class,'update'])->name('bonenvoiUpate');
Route::get('/bonenvoi/search',[bonEnvoiController::class,'search'])->name('bonenvoiSearch');

//for ordonnance de paiement
Route::get('/ordonnacepaie/index',[ordonnancePaiementController::class,'index'])->name('ordonnancepaieIndex');
Route::post('/ordonnacepaie/store',[ordonnancePaiementController::class,'store'])->name('ordonnancepaieStore');
Route::get('/ordonnacepaie/create',[ordonnancePaiementController::class,'create'])->name('ordonnancepaieCreate');
Route::get('/ordonnacepaie/edit/{id}]',[ordonnancePaiementController::class,'edit'])->name('ordonnancepaieEdit');
Route::get('/ordonnacepaie/show/{id}',[ordonnancePaiementController::class,'show'])->name('ordonnancepaieShow');
Route::post('/ordonnacepaie/update/{id}',[ordonnancePaiementController::class,'update'])->name('ordonnancepaieUpate');
Route::get('/ordonnacepaie/search',[ordonnancePaiementController::class,'search'])->name('ordonnancepaieSearch');

//for facture proforma
Route::get('/facturepro/index',[factureProformaController::class,'index'])->name('factureproIndex');
Route::post('/facturepro/store',[factureProformaController::class,'store'])->name('factureproStore');
Route::get('/facturepro/create',[factureProformaController::class,'create'])->name('factureproCreate');
Route::get('/facturepro/edit/{id}]',[factureProformaController::class,'edit'])->name('factureproEdit');
Route::get('/facturepro/show/{id}',[factureProformaController::class,'show'])->name('factureproShow');
Route::post('/facturepro/update/{id}',[factureProformaController::class,'update'])->name('factureproUpate');
Route::get('/facturepro/search',[factureProformaController::class,'search'])->name('factureproSearch');

//for prise en charge 
Route::get('/prisecharge/index',[priseEnchargeController::class,'index'])->name('prisechargeIndex');
Route::post('/prisecharge/store',[priseEnchargeController::class,'store'])->name('prisechargeStore');
Route::get('/prisecharge/create',[priseEnchargeController::class,'create'])->name('prisechargeCreate');
Route::get('/prisecharge/edit/{id}]',[priseEnchargeController::class,'edit'])->name('prisechargeEdit');
Route::get('/prisecharge/show/{id}',[priseEnchargeController::class,'show'])->name('prisechargeShow');
Route::post('/prisecharge/update/{id}',[priseEnchargeController::class,'update'])->name('prisechargeUpate');
Route::get('/prisecharge/search',[priseEnchargeController::class,'search'])->name('prisechargeSearch');


Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

