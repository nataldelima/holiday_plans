<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\HolidayPlans;

class HolidayPlansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
            'location' => $this->faker->city,
            'participants' => json_encode([$this->faker->name]),
        ];
    }
}
