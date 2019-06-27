<?php

use Illuminate\Database\Seeder;
use App\Model\HotelDetails;
//use Faker\Generator as Faker;

class HotelDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clear our existing table
        HotelDetails::truncate();

        //Faker Generator Library
        $faker = \Faker\Factory::create();

        HotelDetails::create([
        	'name' => $faker->name . ' Hotel',
        	'address' => $faker->address,
        	'city' => $faker->city,
        	'state' => 'Delta',
        	'country' => 'Nigeria',
        	'phone_number' => '08033445566',
        	'email' => $faker->email,
        	'zipcode' => '320001',
        	'image' => $faker->imageUrl($width = 800, $height = 600, 'city'),
        ]);
    }
}
