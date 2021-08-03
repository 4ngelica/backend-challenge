<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;

class WalletController extends Controller
{
  public function __construct(Wallet $wallet)
  {
      $this->wallet = $wallet;
  }

  /**
   * Display authenticated user's wallet.
   *
   * @param  Integer
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $wallet = $this->wallet
      ->where('user_id', Auth::user()->id)
      ->first();

    return response()->json($wallet, 200);
  }
}
