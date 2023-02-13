<?php

namespace Database\Seeders\Shared;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 100001; $i++) { 
            DB::table('profiles')->insert([
                //products
                [
                    'uuid' => Str::uuid()->toString(),
                    'user_id' => $i, 
                    'mission' =>fake()->sentence(6,true),
                    'vision' =>fake()->sentence(3,true),
                    'company_values' =>fake()->sentence(6,true),
                    'history' =>fake()->paragraph(5,true),
                    'year' =>fake()->year,
                
                ],



            ]);
        }
    }
}
