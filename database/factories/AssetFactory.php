<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Asset::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'author' => $this->faker->name,
        ];
    }
}
