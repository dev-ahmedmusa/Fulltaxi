<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;
    protected $guarded = [];
    use Translatable; // 2. To add translation methods
    protected $fillable =['name','note'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','note'];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
