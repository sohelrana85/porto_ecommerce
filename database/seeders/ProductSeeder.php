<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        foreach (range(1, 300) as $index) {
            $name = Str::limit($faker->unique()->paragraph(), 100);
            Product::create([
                'name'               => $name,
                'slug'               => slugify($name),
                'category_id'        => rand(1, 50),
                'brand_id'           => rand(1, 12),
                'model'              => '',
                'buying_price'       => rand(5000, 10000),
                'selling_price'      => rand(6500, 7000),
                'special_price'      => rand(5000, 6000),
                'special_price_from' => date('Y-m-' . rand(1, 20)),
                'special_price_to'   => date('Y-m-' . rand(8, 30)),
                'quantity'           => rand(50, 300),
                'sku_code'           => rand(50, 300),
                'color'              => json_encode($this->randomColor()),
                'size'               => json_encode($this->randomSize()),
                'description'        => $faker->paragraph,
                'thumbnail'          => $this->randomthumbnail(),
                'images'             => json_encode($this->randomimages()),
                'status'             => $this->randomStatus(),
                'create_by'          => rand(1, 10)

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
    public function randomColor()
    {
        return array_rand(color(), 3);
    }
    public function randomSize()
    {
        return array_rand(size(), 3);
    }
    public function randomthumbnail()
    {
        return array_rand(thumbnail(), 1);
    }
    public function randomimages()
    {
        return array_rand(images(), 4);
    }
}
