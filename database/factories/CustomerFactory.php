<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ten_khach_hang'=>$this->faker->word,
            'tuoi'=>$this->faker->numberBetween(18, 99),
            'email'=>$this->faker->unique()->safeEmail,
            'dia_chi'=>$this->faker->address,
            'gioi_tinh'=>$this->faker->randomElement(['Nam', 'Nữ', 'Khác']),
        ];
    }
}