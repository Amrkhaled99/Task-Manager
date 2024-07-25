<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Check if the user is an admin if true set as 'admin' else 'password'
        $password = $this->faker->boolean ? bcrypt('admin') : bcrypt('password');

        return [
            'name' => fake()->name(), // Random name
            'email' => fake()->unique()->safeEmail(), // Unique email
            'email_verified_at' => now(), // Set email as verified
            'password' => $password, // Set password based on user type
            'remember_token' => Str::random(10), // Random token for password reset
            'is_admin' => $this->faker->boolean, // Set as admin or not
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
