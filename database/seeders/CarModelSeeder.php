<?php

namespace Database\Seeders;


use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        CarModel::truncate();
        $csvData = fopen(base_path('database/csv/car_models.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                CarModel::create([
                    'car_make_id' => $data['1'],
                    'title' => $data['2'],
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
