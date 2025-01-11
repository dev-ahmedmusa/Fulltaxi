<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory,Notifiable;

    
    // protected $guard = 'client';
   // protected $fillable=['first_name','last_name','email','phone','password'];
   protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
     { 
        return $this->getKey(); 
    } 
    public function getJWTCustomClaims() 
    { 
        return []; 
    }

    // any Client Has Many Trips
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function verifications()
    {
        return $this->hasMany(ClientVerification::class);
    }
    
}
