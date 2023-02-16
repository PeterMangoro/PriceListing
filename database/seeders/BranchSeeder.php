<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert(
            [
                [
                    'title'=>'Accommodations',
                    'image'=>'Accommodations & Offices  🏬 🌃 🏨'
                ],

                [
                    'title'=>'Products',
                    'image'=>'Product Store  💵🛍🛒'
                ],

                [
                    'title'=>'Plots',
                    'image'=>' Estate  🌽🌦🚜'
                ],


                [
                    'title'=>'Transports',
                    'image'=>'Transport & Travel  🗺🛫 🚕'
                ],


                [
                    'title'=>'Services',
                    'image'=>'Services'
                ],



            ]);
    }
}