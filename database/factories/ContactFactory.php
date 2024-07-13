<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('email', 'test@example.com')->first()->id,
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'number' => '+7' . fake()->numerify('##########'),
        ];
    }
}
