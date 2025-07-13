<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();
        $brands = Brand::factory(5)->create();

        Product::factory(30)->create([
            'category_id' => $categories->random()->id,
            'brand_id' => $brands->random()->id,
        ]);
    }
}
