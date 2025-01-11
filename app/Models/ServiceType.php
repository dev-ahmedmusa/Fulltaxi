<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use Translatable; // 2. To add translation methods
    protected $fillable =['name'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','note'];
    use HasFactory;

    public function service(){
    
    return  $this->belongsTo(ServiceType::class);
    }
  
}
