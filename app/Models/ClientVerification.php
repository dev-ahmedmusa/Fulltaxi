<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'passenger_verification_id',
        'access_token',
        'is_expired',
        'expired_at',
    ];


    public function client(){
        return $this->belongsTo(Client::class);
    }
}
