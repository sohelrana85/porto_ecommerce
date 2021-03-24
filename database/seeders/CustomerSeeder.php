<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        foreach (range(1,50) as $value) {

            Customer::create([
                'name'     => $faker->name,
                'phone'    => '88017'.rand(11111111,99999999),
                'email'    => $faker->email,
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
