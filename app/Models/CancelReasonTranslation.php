<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelReasonTranslation extends Model
{
    protected $fillable = ['reason'];
    public $timestamps = false;
}
