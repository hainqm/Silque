<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'viet_danh'=>$this->faker->word,
            'email'=>$this->faker->unique()->safeEmail,
            'so_dien_thoai'=>$this->faker->phoneNumber,
            'tieu_de'=>$this->faker->word,
            'noi_dung'=>$this->faker->sentence,
        ];
    }
}
