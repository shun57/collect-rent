<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LentHistory>
 */
class LentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'lend_money' => $this->faker->numberBetween(0, 10000),
            'interval' => $this->faker->randomElement([1, 3, 7]),
        ];
    }
}
