<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    protected $model = Banner::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tieu_de'=>$this->faker->word,
            'mo_ta'=>$this->faker->sentence,
            'duong_dan_anh'=>$this->faker->word,
            'trang_thai'=>$this->faker->boolean,
        ];
    }
}
