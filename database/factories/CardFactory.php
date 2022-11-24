<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->firstName(),
            'closing_date' => fake()->numberBetween(1, 28),
            'payment_due_date' => fake()->numberBetween(1, 28),
            'credit_limit' => fake()->randomNumber(),
        ];
    }
}
