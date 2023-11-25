<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brands;


class BrandsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brands::class;
    private $availableBrands;
    public function definition(): array
    {
        $minYear = 1111;
        $maxYear = 2023;
        $brands = ['Vinfast', 'Nissan', 'Mazda', 'Mercedes-Benz', 'Mitsubishi', 'Toyota', 'Hyundai', 'Suzuki', 'Peugeot', 'Honda', 'KIA', 'Ford', 'MG', 'Volkswagen'];
        if (empty($this->availableBrands)) {
            $this->availableBrands = $brands;
        }
        $selectedBrand = array_shift($this->availableBrands);
        return [
            'name' => $selectedBrand,
            'logo' => '/storage/yZzjT3lxp1OyOaJ5Hf83_toyota-1689126067.206.png',
            'year_establishment' => mt_rand($minYear, $maxYear),
        ];
    }
}
