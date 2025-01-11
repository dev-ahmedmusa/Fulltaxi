<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTypeTranslation extends Model
{
    protected $fillable = ['name','note'];
    public $timestamps = false;
}
