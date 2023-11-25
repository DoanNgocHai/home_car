<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cars;
use App\Models\Brands;
use App\Models\Figures;
use App\Models\Gears;
use App\Models\Colors;
use App\Models\User;


use DateTime;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cars::class;

    public function definition(): array
    {
        $title = $this->faker->text(100);
        $branch_id = Brands::inRandomOrder()->first();
        $figure_id = Figures::inRandomOrder()->first();
        $gear_id = Gears::inRandomOrder()->first();
        $color_id = Colors::inRandomOrder()->first();
        $user_id = User::inRandomOrder()->first();
        $minYear = 1111;
        $maxYear = 2023;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => rand(150000000, 999999999),
            'brand_id' => $branch_id,
            'figure_id' => $figure_id,
            'gear_id' => $gear_id,
            'color_id' => $color_id,
            'user_id' => $user_id,
            'year' => mt_rand($minYear, $maxYear),
            'odo' => rand(1000, 10000),
            'description' => $this->faker->text(200),
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
