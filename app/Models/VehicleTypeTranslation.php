<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypeTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name','note'];
    public $timestamps = false;
}
