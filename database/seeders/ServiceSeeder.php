<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->delete();
     
$dataSeeder = [
    ['name' =>   'Taxi','status' => "Active"],
    ['name' =>  'Delivery','status' => "Active"],
    ['name' => 'Moto','status' => "Active"],
];
    // Using Eloquent
   
       
        Service::insert($dataSeeder);
          
          

   
    }
}
