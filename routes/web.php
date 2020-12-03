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

Route::get('/bonsortie/index',[bonSortieController::class,'index'])->name('bonsortieIndex');
// Route::get('/bonsortie/create',[bonSortieController::class,'create'])->name('bonsortieCreate');
// Route::get('/bonsortie/edit',[bonSortieController::class,'edit'])->name('bonsortieEdit');

Route::get('/bonenvoi/index',[bonEnvoiController::class,'index'])->name('bonenvoiIndex');
Route::post('/bonenvoi/store',[bonEnvoiController::class,'store'])->name('bonenvoiStore');
Route::get('/bonenvoi/create',[bonEnvoiController::class,'create'])->name('bonenvoiCreate');
Route::get('/bonenvoi/edit/{id}]',[bonEnvoiController::class,'edit'])->name('bonenvoiEdit');
Route::get('/bonenvoi/show/{id}',[bonEnvoiController::class,'show'])->name('bonenvoiShow');
Route::post('/bonenvoi/update/{id}',[bonEnvoiController::class,'update'])->name('bonenvoiUpate');


Route::get('/facturepro/index',[factureProformaController::class,'index'])->name('factureproIndex');

Route::get('/ordonnacepaie/index',[ordonnancePaiementController::class,'index'])->name('ordonnancepaieIndex');

Route::get('/prisecharge/index',[priseEnchargeController::class,'index'])->name('prisechargeIndex');
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

