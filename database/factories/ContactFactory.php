<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->randomNumber(6, true) . '' . fake()->randomNumber(5, true),
            'zip_code' => fake()->randomNumber(8, true),
            'street' => fake()->streetName(),
            'st_number' => fake()->buildingNumber(),
            'complement' => fake()->word(),
            'neighborhood' => fake()->word(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'note' => fake()->sentence(),
        ];
    }
}
