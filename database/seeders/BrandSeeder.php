<?php

namespace Database\Seeders;

use App\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = json_decode(File::get(storage_path('assest/brands.json')), true);

        foreach ($data as $value) {
            Brand::create($value);
        }

        // $faker = Factory::create();

        // foreach (range(1, 20) as $index) {
        //     $name = substr($faker->unique()->name, 0, 20);
        //     Brand::create([
        //         'name' => $name,
        //         'slug' => strtolower(str_replace(' ', '-', $name)),
        //         'create_by' => rand(1, 11),
        //         'status' => $this->randomStatus(),
        //     ]);
        // }
    }

    // public function randomStatus()
    // {
    //     $status = ([
    //         'active' => 'active',
    //         'inactive' => 'inactive'
    //     ]);
    //     return array_rand($status);
    // }
}
