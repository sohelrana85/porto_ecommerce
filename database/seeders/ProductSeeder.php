<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 500) as $index) {
            $name = $faker->unique()->name;
            Product::create([
                'name'               => $name,
                'slug'               => slugify($name),
                'category_id'        => rand(12, 50),
                'brand_id'           => rand(1, 12),
                'buying_price'       => rand(1000, 10000),
                'selling_price'      => rand(1000, 10000),
                'special_price'      => rand(100, 1000),
                'quantity'           => rand(10, 100),
                'sku_code'           => rand(1111111111111, 999999999999999),
                'description'        => $faker->text,
                'thumbnail'          => $faker->imageUrl(),
                'status'             => $this->randomStatus(),
                'create_by'          => rand(1, 11),

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
