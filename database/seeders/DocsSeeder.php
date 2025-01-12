<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DocumentMaster;
use Illuminate\Support\Facades\DB;

class DocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_masters')->delete();
     
        $dataSeeder = [
            ['name' => 'صورة شخصية','name_ar' => 'Personal Image','doc_for' => 'Driver','doc_type' => 'Personal_Image','status' => "Active"],
            ['name' => 'رخصة قيادة','name_ar' => 'Driver License','doc_for' => 'Driver','doc_type' => 'Driver_License','status' => "Active"],
            ['name' => 'صورة للمركبة','name_ar' => 'Vehicle Image','doc_for' => 'Vehicle','doc_type' => 'Vehicle_Image','status' => "Active"],
            ['name' => 'رخصة المركبة','name_ar' => 'Vehicle License','doc_for' => 'Vehicle','doc_type' => 'Vehicle_License','status' => "Active"],
      
        ];
            // Using Eloquent
           
               
            DocumentMaster::insert($dataSeeder);
    }
}
