<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'email',
      'password',
      'identity',
      'type'
    ];

    public function rules()
    {
      return [
        'name' => 'required',
        'email' => 'required|unique:users,email,'.$this->id,
        'password' => 'required',
        'identity' => 'required|unique:users,identity',
        'type' => 'required'
      ];
    }

    public function feedback()
    {
      return [
        'required' => 'The :attribute field is required',
        'email.unique' => 'The :attribute must be unique',
        'identity.unique' => 'The :attribute must be unique'
      ];
    }

    public function getWallet()
    {
      return Wallet::where($this->id, 'user_id')->first();
    }

    public function getUserType(){

    }
}
