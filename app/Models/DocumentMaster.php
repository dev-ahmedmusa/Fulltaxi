<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMaster extends Model
{
   // use Translatable; // 2. To add translation methods
    protected $fillable =['name','name_ar','doc_type','expire_valid_for'];
    // 3. To define which attributes needs to be translated
   // public $translatedAttributes = ['name'];
    use HasFactory;
    
}
