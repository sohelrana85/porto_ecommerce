<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = json_decode(File::get(storage_path('assest/categories.json')), true);

        foreach ($data as $value) {
            Category::create($value);
        }

        // $faker = Factory::create();

        // foreach (range(1, 50) as $index) {

        //     $name = $faker->unique()->name;
        //     Category::create([

        //         'root' => rand(0, 5),
        //         'name' => $name,
        //         'slug' => strtolower(str_replace(' ', '-', $name)),
        //         'status' => $this->randomStatus(),
        //         'create_by' => rand(1, 5),
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
