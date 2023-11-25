<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use DateTime;

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
    protected $model = User::class;

    public function definition(): array
    {
        $name = fake()->userName;
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->freeEmail(),
            'password' => '$2y$10$ecqNp3Zm2/4IoaYtL1gQfu9UhgfdU5eoyA3j8DgcDKeVagnE.3QMa', //test1234
            'date_of_birth' => new DateTime(),
            'address' => fake()->address(),
            'phone' => rand(1000000000, 9999999999),
            'post_count' => rand(1, 30),
            'role' => 'user'
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
