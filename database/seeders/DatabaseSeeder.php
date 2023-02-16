<?php

namespace Database\Seeders;

use App\Models\Plot;
use App\Models\User;
use App\Models\Car\Car;
use App\Models\Product;
use App\Models\Service;
use App\Models\Shared\Room;
use App\Models\Shared\Price;
use App\Models\Accommodation;
use App\Models\Car\Transport;
use App\Models\Shared\Social;
use App\Models\Shared\Address;
use App\Models\Shared\Payment;
use App\Models\Shared\Profile;
use App\Models\Shared\Employee;
use App\Models\Shared\RoomUser;
use Illuminate\Database\Seeder;
use Database\Seeders\BranchSeeder;
use Database\Seeders\RatingSeeder;
use Database\Seeders\CarMakeSeeder;
use Database\Seeders\CarModelSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DiscountSeeder;
use Database\Seeders\AddressesSeeder;
use Database\Seeders\AttachmentSeeder;
use Database\Seeders\ClassificationSeeder;
use Database\Seeders\Shared\ProfileSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create([
        //     'name' => 'Peter Mangoro',
        //     'username' => 'PeterMangoro',
        //         ]);
        // User::factory(100000)->create();
        // Car::factory(100000)->create();
        // Product::factory(100)->create();
        // Transport::factory(100000)->create();
        // Service::factory(100000)->create();
        // Accommodation::factory(100000)->create();
        // Social::factory(100000)->create();
        // Plot::factory(100000)->create();
        // Employee::factory(100000)->create();
        // Profile::factory(100000)->create();
        // Room::factory(150)->create();
        // RoomUser::factory(100)->create();
        // Payment::factory(10000)->create();
        // Price::factory(160)->create();
        // Address::factory(10)->create();

        $this->call([
            CarMakeSeeder::class,
            CarModelSeeder::class,
            // AttachmentSeeder::class,
            // BranchSeeder::class,
            // RatingSeeder::class,
            CategorySeeder::class,
            // ClassificationSeeder::class,
            // AddressesSeeder::class,
            // DiscountSeeder::class,
            // ProfileSeeder::class,
           

        ]);
    }
}
