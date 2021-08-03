<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
      'name',
      'email',
      'password',
      'identity',
      'type'
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::Class, 'user_id');
    }

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

    public function getUserType(){
      //
    }

    public function setPasswordAttribute($value)
    {
    $this->attributes['password'] = bcrypt($value);
    }

    public function getWallet()
    {
      return Wallet::where('user_id', $this->id)->first();
    }

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
   {
       return [];
   }
}
