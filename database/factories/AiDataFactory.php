<?php

namespace Database\Factories;

use App\Models\AiData;
use Illuminate\Database\Eloquent\Factories\Factory;

class AiDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = AiData::class;

    public function definition()
    {
        return [
            'scheme'=>$this->faker->word,
            'a_color'=>$this->faker->numberBetween(1,255),
             'b_color'=>$this->faker->numberBetween(1,255),
             'c_color'=>$this->faker->numberBetween(1,255),
            'd_color'=>$this->faker->numberBetween(1,255),
            'e_color'=>$this->faker->numberBetween(1,255),
        ];
    }
}
