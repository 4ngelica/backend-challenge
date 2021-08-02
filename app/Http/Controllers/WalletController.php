<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
  public function __construct(Wallet $wallet)
  {
      $this->wallet = $wallet;
  }

  /**
   * Display a listing of the wallets. Here
   * you may consult the wallet id to make
   * transactions
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $wallets = $this->wallet->all();
      return response()->json($wallets, 200);
  }

  /**
   * Show the form for creating a new getWallet.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate($this->wallet->rules(), $this->wallet->feedback());
      $wallet = $this->wallet->create($request->all());
      return response()->json($wallet, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  Integer
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $wallet = $this->wallet->find($id);
    if($wallet === null) {
        return response()->json(['erro' => 'Wallet does not exist.'], 404) ;
    }

    return response()->json($wallet, 200);
  }

  // /**
  //  * Show the form for editing the specified resource.
  //  *
  //  * @param  \App\Models\Wallet  $wallet
  //  * @return \Illuminate\Http\Response
  //  */
  // public function edit(Wallet $wallet)
  // {
  //     //
  // }

  // /**
  //  * Update the specified resource in storage.
  //  *
  //  * @param  \Illuminate\Http\Request  $request
  //  * @param  \App\Models\Wallet  $wallet
  //  * @return \Illuminate\Http\Response
  //  */
  // public function update(Request $request, Wallet $wallet)
  // {
  //     //
  // }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Wallet  $wallet
   * @return \Illuminate\Http\Response
   */
  public function destroy(Wallet $wallet)
  {
      //
  }
}
