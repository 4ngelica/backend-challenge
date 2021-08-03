<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function checkBalance()
    {
      $balance = Wallet::where('user_id', Auth::user()->id)->pluck('balance')->all();
      return $balance;
    }
}
