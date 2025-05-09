<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(5)->create();
        // =
        // Category::factory()->count(5)->create()->each(function($category){
        //     Product::factory()->count(10)->create(['category_id'=>$category->id]);
        // });
    }
}