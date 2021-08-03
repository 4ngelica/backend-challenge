<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'payee_id',
      'value'
    ];

    public function rules()
    {
      return [
        'payee_id' => 'required',
        'value' => 'required',
      ];
    }

    public function feedback()
    {
      return [
        'required' => 'The :attribute field is required',
      ];
    }

    public function payer()
    {
        return $this->belongsTo(User::Class, 'payer_id');
    }

    public function payee()
    {
        return $this->belongsTo(User::Class, 'payee_id');
    }

    public function checkAuthorization()
    {
      // return Response::json([
      //   'message' => 'authorized'
      // ]);
    }
}
