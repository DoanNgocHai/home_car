<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Figures;
use App\Models\Brands;


class FiguresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Figures::class;
    private $availableBrands;
    public function definition(): array
    {
        $names = ['Hatchback', 'MPV', 'Sedan', 'SUV', 'Pickup', 'CUV'];
        if (empty($this->availableBrands)) {
            $this->availableBrands = $names;
        }
        $selectedName = array_shift($this->availableBrands);
        return [
            'name' => $selectedName,
            'slug' => strtolower($selectedName),
        ];
    }
}
