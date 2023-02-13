<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for products
        // for ($i=0; $i < 300000; $i++) { 
        //     DB::table('product_classifications')->insert([
        //             //products
        //             ['product_category_id'=>rand(1,32),
        //             'product_id'=>rand(1,300000)],

        //             ['product_category_id'=>rand(1,32),
        //             'product_id'=>$i],
                               

        // ]);
        // };

        // for ($i=0; $i < 300000; $i++) { 
        //     DB::table('accommodation_classifications')->insert([

        //             //accommodations
        //             ['accommodation_category_id'=>rand(1,21),
        //             'accommodation_id'=>rand(1,300000)],

        //             ['accommodation_category_id'=>rand(1,21),
        //             'accommodation_id'=>$i],

        // ]);
        // };

        for ($i=0; $i < 100000; $i++) { 
            DB::table('car_classifications')->insert([
                    //cars
                    ['car_category_id'=>rand(1,13),
                    'car_id'=>rand(1,300000)],

                    ['car_category_id'=>rand(1,13),
                    'car_id'=>$i],
        ]);
        };
        
        // for ($i=0; $i < 300000; $i++) { 
        //     DB::table('transport_classifications')->insert([
                  

        //             //transports
        //             ['transport_category_id'=>rand(1,3),
        //            'transport_id'=>rand(1,300000)],

        //            ['transport_category_id'=>rand(1,3),
        //            'transport_id'=>$i],
                  
        // ]);
        // };

        // for ($i=0; $i < 300000; $i++) { 
        //     DB::table('service_classifications')->insert([
                 
        //             //service
        //             ['service_category_id'=>rand(1,32),
        //             'service_id'=>rand(1,300000)],

        //             ['service_category_id'=>rand(1,32),
        //             'service_id'=>$i],
        // ]);
        // };
    }
}
