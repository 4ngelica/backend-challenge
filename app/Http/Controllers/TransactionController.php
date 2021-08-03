<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Auth;

class TransactionController extends Controller
{
  public function __construct(Transaction $transaction)
  {
      $this->transaction = $transaction;
  }

  /**
   * Display all transactions of
   * an authenticated user
   * @param  Integer
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $transactions = $this->transaction->where('payer_id', Auth::user()->id);
      if($transactions === NULL){
        return response()->json(['error' => 'This user doesn\'t have any transactions yet.'], 404) ;
      }
      return response()->json($transactions, 200);
  }

  /**
   * Display the specified transaction.
   * of an authenticated user
   * @param  Integer
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $transaction = $this->transaction->find($id);
    if($transaction === null) {
        return response()->json(['erro' => 'Transaction does not exist.'], 404) ;
    }

    return response()->json($transaction, 200);
  }

  /**
   * Store a newly created transaction in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate($this->transaction->rules(), $this->transaction->feedback());

      //check wallet value
      $balance = new Wallet();
      $balance = $balance->checkBalance();

      if($balance[0] <= $request->value){

        //check external authorization
        $authorization = new Transaction();
        $authorization = $authorization->checkAuthorization();
        // if($authorization == 'authorized'){
        //
        //   log::debug($request->all());
        //   $transaction = $this->transaction->payer()->create();
        //
        //   return response()->json(['Success'=>'Transaction ok'], 200);
        // }
      }
      return response()->json(['Error' => 'Transaction not ok'], 404);
      }

      //Reverse a transaction
      public function delete($id)
      {
        //
      }
}
