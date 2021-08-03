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
Route::get('user', [UserController::class, 'index'])->name('index.user');
Route::get('user/{id}', [UserController::class, 'show'])->name('show.user');
Route::post('user', [UserController::class, 'store'])->name('store.user');

Route::group(['middleware' => ['auth.api']], function() {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('wallet', [WalletController::class, 'show'])->name('show.wallet');
  Route::get('transaction', [TransactionController::class, 'index'])->name('index.transaction');
  Route::post('transaction', [TransactionController::class, 'store'])->name('store.transaction');
  Route::get('transaction/{id}', [TransactionController::class, 'show'])->name('show.transaction');
  Route::delete('transaction/{id}', [TransactionController::class, 'delete'])->name('delete.transaction');
});
