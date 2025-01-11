<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMasterTranslation extends Model
{
    protected $table = 'document_master_translations'; // Name of the translations table
 
    protected $fillable = ['name'];
    public $timestamps = false;
}
