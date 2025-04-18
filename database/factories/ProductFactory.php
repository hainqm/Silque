<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ma_san_pham'=>$this->faker->word,
            'ten_san_pham'=>$this->faker->word,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'gia'=> $this->faker->randomFloat(0, 1000, 50000),
            'gia_khuyen_mai'=>$this->faker->randomFloat(0, 500, 50000),
            'so_luong'=> $this->faker->numberBetween(1, 100),
            'ngay_nhap'=> $this->faker->date(),
            'mo_ta'=> $this->faker->sentence(10),
            'trang_thai'=> $this->faker->boolean(),

        ];
    }
}
