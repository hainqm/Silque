<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
             'ten_nguoi_dung'=>$this->faker->word,
            'ten_san_pham'=>$this->faker->word,
            'so_sao'=>$this->faker->numberBetween(1,5),
            'noi_dung_danh_gia'=>$this->faker->sentence,

        ];
    }
}
