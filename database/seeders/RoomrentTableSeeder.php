<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoomrentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roomrent')->insert(array(
            [
                'house_number'=>'5 หมู่6',
                'room_number'=>'1',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'5 หมู่6',
                'room_number'=>'2',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'5 หมู่6',
                'room_number'=>'3',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'5 หมู่6',
                'room_number'=>'4',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'5 หมู่6',
                'room_number'=>'บ้านสองชั้น',
                'room_fee'=>4000,
                'waste_cost'=>10,
                'category_id'=>2,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'43/3',
                'room_number'=>'1',
                'room_fee'=>1300,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'43/3',
                'room_number'=>'2',
                'room_fee'=>1300,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'43/3',
                'room_number'=>'บ้านสองชั้น',
                'room_fee'=>3500,
                'waste_cost'=>10,
                'category_id'=>2,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'1',
                'room_fee'=>1300,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'2',
                'room_fee'=>1200,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'3',
                'room_fee'=>1500,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'4',
                'room_fee'=>1500,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'5',
                'room_fee'=>1500,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'6',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'7',
                'room_fee'=>1000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'8',
                'room_fee'=>2000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'9 (ร้านตัดผม)',
                'room_fee'=>2000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
            [
                'house_number'=>'35 หมู่5',
                'room_number'=>'10 (ซีดี)',
                'room_fee'=>2000,
                'waste_cost'=>10,
                'category_id'=>1,
                'old_fire_number'=>1,
                'old_water_number'=>1
            ],
        ));
    }
}
