<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'payer_id',
      'payee_id',
      'value'
    ];

    public function payer()
    {
        return $this->belongsTo(User::Class, 'payer_id');
    }

    public function payee()
    {
        return $this->belongsTo(User::Class, 'payee_id');
    }
}
