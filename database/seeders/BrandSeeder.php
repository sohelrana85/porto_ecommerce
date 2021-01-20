<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        foreach (range(1, 20) as $index) {
            $name = substr($faker->unique()->name, 0, 10);
            Brand::create([
                'name' => $name,
                'slug' => strtolower(str_replace(' ', '-', $name)),
                'create_by' => rand(1, 10),
                'status' => $this->randomStatus(),
            ]);
        }
    }

    public function randomStatus()
    {
        $status = ([
            'active' => 'active',
            'inactive' => 'inactive'
        ]);
        return array_rand($status);
    }
}
