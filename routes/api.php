<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');


//Doesnt need authentication
Route::get('user', [UserController::class, 'index'])->name('index.user');
Route::get('user/{id}', [UserController::class, 'show'])->name('show.user');
Route::post('user', [UserController::class, 'store'])->name('store.user');

//Needs authentication
Route::group(['middleware' => ['auth.api']], function() {
  Route::get('wallet/test/{id}', [WalletController::class, 'test'])->name('test.wallet');
  Route::get('wallet/{id}', [WalletController::class, 'show'])->name('show.wallet');
  Route::get('transaction/{id}', [TransactionController::class, 'index'])->name('index.transaction');
  Route::get('transaction/{id}/{transactionId}', [TransactionController::class, 'show'])->name('show.transaction');
  Route::post('transaction/{id}', [TransactionController::class, 'store'])->name('store.transaction');
});
