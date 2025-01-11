<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceType;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_types')->delete();
     
        $dataSeeder = [

           [
            'name' => 'تاكسي',
            'note' => 'تاكسي',
            'image' => 'SeedImage/Taxi.png','service_id' => 1,
            'translations' => [
                'ar' => ['name' => 'تاكسي','note' => 'تاكسي'],
                'en' => ['name' => 'Taxi','note' => 'Taxi'],
            ],
           ] ,
        //    [
        //     'name' => 'ديليفري',
        //     'note' => 'ديليفري',
        //    'image' => 'SeedImage//Delivery.png','service_id' =>2,
        //     'translations' => [
        //         'ar' => ['name' => 'ديليفري','note' => 'ديليفري'],
        //         'en' => ['name' => 'Delivery','note' => 'Delivery'],
        //     ],
        //    ],
        //    [
        //     'name' => 'موتور',
        //     'note' => 'موتور',
        //     'image' => 'SeedImage//Motor.png','service_id' => 3,
        //     'translations' => [
        //         'ar' => ['name' => 'موتور','note' => 'موتور'],
        //         'en' => ['name' => 'Motor','note' => 'Motor'],
        //     ],
        //    ]
        ];
        
      
          
               ServiceType::insert($dataSeeder);
     

        
         
    }
}
