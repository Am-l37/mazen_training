<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departmentrole>
 */
class DepartmentroleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           /* 'dep_id'=>$this->faker->randomDigit,
            'role_id'=>$this->faker->randomDigit,
            */
            'dep_id'=>1,
            'role_id'=>2,
        ];
    }
}
