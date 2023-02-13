<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert(
            [
                [
                    'title' => 'Furniture',
                    'slug' => 'furniture',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Advertising & Marketing',
                    'slug' => 'advertising_&_marketing',
                    'type' => 'marketing'
                ],
                [
                    'title' => 'Agriculture',
                    'slug' => 'agriculture',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Animal Supplies',
                    'slug' => 'animal_supplies',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Baby Accessories',
                    'slug' => 'baby_accessories',
                    'type' => 'baby_accessories'

                ],
                [
                    'title' => 'Hardware, Building Materials & Accessories',
                    'slug' => 'hardware_building_materials_&_accessories',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Business & Home Security',
                    'slug' => 'business_&_home_security',
                    'type' => 'security'
                ],
                [
                    'title' => 'Electronics, Communications, Camera & Optics',
                    'slug' => 'electronics_communications_camera_&_optics',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Construction',
                    'slug' => 'construction',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Food, Cooking & Baking Ingredients',
                    'slug' => 'food_cooking_&_baking_ingredients',
                    'type' => 'food'
                ],
                [
                    'title' => 'Dairy Products',
                    'slug' => 'dairy_products',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Decor',
                    'slug' => 'decor',
                    'type' => 'home'
                ],
                [
                    'title' => 'Film & Television',
                    'slug' => 'film_&_television',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Finance & Insurance',
                    'slug' => 'finance_&_insurance',
                    'type' => 'finance'
                ],
                [
                    'title' => 'Flood, Fire & Gas Safety',
                    'slug' => 'flood_fire_&_gas_safety',
                    'type' => 'safety'
                ],
                [
                    'title' => 'Food Service',
                    'slug' => 'food_service',
                    'type' => 'food'
                ],
                [
                    'title' => 'Forestry & Logging',
                    'slug' => 'forestry_&_logging',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Fruits & Vegetables',
                    'slug' => 'fruits_&_vegetables',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Furniture Sets',
                    'slug' => 'furniture_sets',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Hairdressing & Cosmetology',
                    'slug' => 'hairdressing_&_cosmetology',
                    'type' => 'beauty'
                ],
                [
                    'title' => 'Hotel & Hospitality',
                    'slug' => 'hotel_&_hospitality',
                    'type' => 'home'
                ],
                [
                    'title' => 'Jewelry & Shoes',
                    'slug' => 'jewelry_&_shoes',
                    'type' => 'beauty'
                ],
                [
                    'title' => 'Law Enforcement',
                    'slug' => 'law_enforcement',
                    'type' => 'law'
                ],
                [
                    'title' => 'Manufacturing',
                    'slug' => 'manufacturing',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Medical & Medical Accessories',
                    'slug' => 'medical_&_medical_accessories',
                    'type' => 'health'
                ],
                [
                    'title' => 'Motor Vehicles & Vehicle Accessories',
                    'slug' => 'motor_vehicles_&_vehicle_accessories',
                    'type' => 'hardware'
                ],
                [
                    'title' => 'Networking',
                    'slug' => 'networking',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Print, Copy, Scan & Fax',
                    'slug' => 'print_copy_scan_&_fax',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Sporting Equipment',
                    'slug' => 'sporting_equipment',
                    'type' => 'health'
                ],
                [
                    'title' => 'Suits',
                    'slug' => 'suits',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Traditional & Ceremonial Clothing',
                    'slug' => 'traditional_&_ceremonial_clothing',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Business Attire',
                    'slug' => 'business_attire',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Casual Wear',
                    'slug' => 'casual_wear',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Formal Wear',
                    'slug' => 'formal_wear',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Uniforms $ Tracksuits',
                    'slug' => 'uniforms_&_tracksuits',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Sports Wear',
                    'slug' => 'sports_wear',
                    'type' => 'fashion_&_uniforms'
                ],
                [
                    'title' => 'Work Safety Protective Gear',
                    'slug' => 'work_safety_protective_gear',
                    'type' => 'hardware'
                ],
            ]

        );

        DB::table('service_categories')->insert(
            [
                [
                    'title' => 'carpentry',
                    'slug' => 'carpentry',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Advertising & Marketing',
                    'slug' => 'advertising_&_marketing',
                    'type' => 'marketing'
                ],
                [
                    'title' => 'Agriculture & Animal Services',
                    'slug' => 'agriculture_&_animal_services',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Child Care & Nursery',
                    'slug' => 'child_care_&_nursery',
                    'type' => 'child_care'
                ],
                [
                    'title' => 'Building Services',
                    'slug' => 'building_services',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Business & Home Security',
                    'slug' => 'business_&_home_security',
                    'type' => 'security'
                ],
                [
                    'title' => 'Construction',
                    'slug' => 'construction',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Food, Cooking & Baking',
                    'slug' => 'food_cooking_&_baking',
                    'type' => 'hospitality'
                ],
                [
                    'title' => 'Decor & Land Scaping',
                    'slug' => 'decor_&_land_scaping',
                    'type' => 'decor'
                ],
                [
                    'title' => 'Film & Television',
                    'slug' => 'film_&_television',
                    'type' => 'entertainment'
                ],
                [
                    'title' => 'Finance & Insurance',
                    'slug' => 'finance_&_insurance',
                    'type' => 'finance'
                ],
                [
                    'title' => 'Flood, Fire & Gas Safety',
                    'slug' => 'flood_fire_&_gas_safety',
                    'type' => 'safety'
                ],
                [
                    'title' => 'Food Service',
                    'slug' => 'food_service',
                    'type' => 'hospitality'
                ],
                [
                    'title' => 'Forestry & Logging',
                    'slug' => 'forestry_&_logging',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Furniture Sets',
                    'slug' => 'furniture_sets',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Hairdressing & Cosmetology',
                    'slug' => 'hairdressing_&_cosmetology',
                    'type' => 'fashion'
                ],
                [
                    'title' => 'Hotel & Hospitality',
                    'slug' => 'hotel_&_hospitality',
                    'type' => 'hospitality'
                ],
                [
                    'title' => 'Law Enforcement',
                    'slug' => 'law_enforcement',
                    'type' => 'law'
                ],
                [
                    'title' => 'Manufacturing',
                    'slug' => 'manufacturing',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Medical & Health Services',
                    'slug' => 'medical_&_health_service',
                    'type' => 'health'
                ],
                [
                    'title' => 'Motor Vehicle Services',
                    'slug' => 'motor_vehicle_services',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Networking',
                    'slug' => 'networking',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Print, Copy, Scan & Fax',
                    'slug' => 'print_copy_scan_&_fax',
                    'type' => 'electrical'
                ],
                [
                    'title' => 'Sporting & Training',
                    'slug' => 'sporting_&_training',
                    'type' => 'health'
                ],
                [
                    'title' => 'Fashion & Clothing Services',
                    'slug' => 'fashion_&_clothing_services',
                    'type' => 'fashion'
                ],
                [
                    'title' => 'Work, Safety & Protective Gear',
                    'slug' => 'work_safety_&_protective_gear',
                    'type' => 'safety'
                ],
                [
                    'title' => 'Metal Work',
                    'slug' => 'metal_work',
                    'type' => 'manufacture_&_fix'
                ],
                [
                    'title' => 'Animals & Pets',
                    'slug' => 'animals_&_pets',
                    'type' => 'agriculture'
                ],
                [
                    'title' => 'Baby Sitting',
                    'slug' => 'baby_sitting',
                    'type' => 'child_care'
                ],
                [
                    'title' => 'Business & Retail Services',
                    'slug' => 'business_&_retail_services',
                    'type' => 'marketing'
                ],
                [
                    'title' => 'Art & Craftsmanship',
                    'slug' => 'art_&_craftsmanship',
                    'type' => 'art'
                ],
                [
                    'title' => 'Science & Laboratory',
                    'slug' => 'science_$_laboratory',
                    'type' => 'science'
                ],
                [
                    'title' => 'Banners & Advertising Signage',
                    'slug' => 'banners_&_advertising_signage',
                    'type' => 'marketing'
                ],
                [
                    'title' => 'Plumbing',
                    'slug' => 'plumbing',
                    'type' => 'manufacture_&_fix'
                ],
            ],
        );

        // DB::table('transport_categories')->insert(
        //     [
        //         [
        //             'title' => 'Train'
        //         ],
        //         [
        //             'title' => 'Air'
        //         ],
        //         [
        //             'title' => 'Water'
        //         ],

        //         [
        //             'title' => 'Road'
        //         ],
        //     ],
        // );

        // DB::table('car_categories')->insert(
        //     [
        //         [
        //             'title' => 'Family',
        //             'slug' => 'family',
        //             'type' => 'family',
        //         ],
        //         [
        //             'title' => 'Off-Road',
        //             'slug' => 'off_Road',
        //             'type' => 'off-Road',
        //         ],
        //         [
        //             'title' => 'Truck',
        //             'slug' => 'truck',
        //             'type' => 'truck',
        //         ],
        //         [
        //             'title' => 'SUV',
        //             'slug' => 'suv',
        //             'type' => 'suv',
        //         ],
        //         [
        //             'title' => 'Sedan',
        //             'slug' => 'sedan',
        //             'type' => 'sedan',
        //         ],
        //         [
        //             'title' => 'Crossover',
        //             'slug' => 'crossover',
        //             'type' => 'crossover',
        //         ],
        //         [
        //             'title' => 'Coupe',
        //             'slug' => 'coupe',
        //             'type' => 'coupe',
        //         ],
        //         [
        //             'title' => 'Convertible',
        //             'slug' => 'convertible',
        //             'type' => 'convertible',
        //         ],
        //         [
        //             'title' => 'MPV',
        //             'slug' => 'mpv',
        //             'type' => 'MPV',

        //         ],
        //         [
        //             'title' => 'Hatchback',
        //             'slug' => 'hatchback',
        //             'type' => 'hatchback',
        //         ],
        //         [
        //             'title' => 'Van',
        //             'slug' => 'van',
        //             'type' => 'van',
        //         ],
        //         [
        //             'title' => 'Sport',
        //             'slug' => 'sport',
        //             'type' => 'sport',
        //         ],
        //         [
        //             'title' => 'Electric',
        //             'slug' => 'electric',
        //             'type' => 'electric',
        //         ],

        //     ],
        // );

        DB::table('accommodation_categories')->insert(
            [
                [
                    'title' => 'Hotels',
                    'slug' => 'hotels',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Bed & Breakfast',
                    'slug' => 'bed_&_breakfast',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Guest Houses',
                    'slug' => 'guest_houses',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Home Stays',
                    'slug' => 'home_stays',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Chalets',
                    'slug' => 'chalets',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Youth Hostel',
                    'slug' => 'youth_hostel',
                    'type' => 'Catered'
                ],
                [
                    'title' => 'Cottages',
                    'slug' => 'cottages',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Apartments',
                    'slug' => 'apartments',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Boats',
                    'slug' => 'boats',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Cabins',
                    'slug' => 'cabins',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Chalets',
                    'slug' => 'chalets',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Motels',
                    'slug' => 'motels',
                    'type'=>'Self-Catered'
                ],
                [
                    'title' => 'Caravans',
                    'slug' => 'caravans',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Motor Homes',
                    'slug' => 'motor_homes',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Office Rentals',
                    'slug' => 'office_rentals',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Student Hostels',
                    'slug' => 'student_hostels',
                    'type' => 'Self-Catered'
                ],
               
               
                [
                    'title' => 'Studios',
                    'slug' => 'studios',
                    'type' => 'Catered'

                ],
                [
                    'title' => 'Bungalows',
                    'slug' => 'bungalows',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Villas',
                    'slug' => 'villas',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'FarmHouses',
                    'slug' => 'farm_houses',
                    'type' => 'Self-Catered'
                ],
                [
                    'title' => 'Resorts',
                    'slug' => 'resorts',
                    'type' => 'Catered'
                ],
            ]

        );
    }
}
