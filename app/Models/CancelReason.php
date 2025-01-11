<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelReason extends Model
{
    use Translatable; // 2. To add translation methods
    protected $fillable =['reason','for_user'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['reason'];
    use HasFactory;
}
