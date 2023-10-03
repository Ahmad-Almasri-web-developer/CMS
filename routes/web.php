<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);


Route::prefix('/')->middleware('can:Admin')->group(function() {
    
    Route::get('/manage', function () {
        return view('cms.manage');
    })->name('manage');
    Route::get('/manage/offers', function () {
        return view('cms.offers.manage');
    })->name('offersManage');
    

        Route::resource('/clients', ClientController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/offers', OfferController::class);
        Route::get('/clients_offer/{id}',[OfferController::class, 'clients'] )->name('clientsOffer');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/adminstration')->middleware('can:SuperAdmin')->group(function() {
    Route::resource('/users', UserController::class);

});
    //----------------------------------------------------------------------------------------------------------
 
    
});