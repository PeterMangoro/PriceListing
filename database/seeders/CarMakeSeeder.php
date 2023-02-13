<?php

namespace Database\Seeders;

use App\Models\CarMake;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarMake::truncate();
        $csvData = fopen(base_path('database/csv/car_makes.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                CarMake::create([
                    'title' => $data['1'],
                    // 'price' => $data['1'],
                    // 'payment_type' => $data['2'],
                    // 'name' => $data['3'],
                    // 'city' => $data['4'],
                    // 'us_zip' => $data['5'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
    
}
