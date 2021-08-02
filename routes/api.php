<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;


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

//Show user
Route::get('user', [UserController::class, 'index'])->name('index.user');
Route::get('user/{id}', [UserController::class, 'show'])->name('show.user');
Route::post('user', [UserController::class, 'store'])->name('store.user');

Route::get('wallet', [WalletController::class, 'index'])->name('index.wallet');
Route::get('wallet/{id}', [WalletController::class, 'show'])->name('show.wallet');


//Auth:  login and register users
// Route::post('login', [UserController::class, 'login'])->name('login');
// Route::get('user/{id}', [AuthController::class, 'auth'])->name('auth');
//
// //Show wallet
// Route::get('wallet', [WalletController::class, 'show'])->name('show.wallet');
//
// //Transaction: ver transacao, listar transacoes e realizar transação
// Route::get('transaction', [TransactionController::class, 'index'])->name('index.transaction');
// Route::get('transaction/{id}', [TransactionController::class, 'show'])->name('show.transaction');
// Route::post('transaction', [TransactionController::class, 'create'])->name('create.transaction');
