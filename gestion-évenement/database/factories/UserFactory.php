<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;

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
    public function definition(): array
    {
        $adminRole = Role::where('name_role', 'admin')->first();
        $modulatorRole = Role::where('name_role', 'modulator')->first();

        return [
            'name_user' => fake()->name(),
            'cin' => $this->faker->unique()->numerify('########'),
            'tel_user' => $this->faker->phoneNumber,
            'email_user' => fake()->unique()->safeEmail(),
            'pw_user' => bcrypt('password'),
            'email_verified_at' => now(),

            // 'pw_user' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'id_role' => $this->faker->randomElement([$adminRole->id_role, $modulatorRole->id_role]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
