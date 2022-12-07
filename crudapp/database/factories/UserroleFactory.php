<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Userrole>
 */
class UserroleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           /* 'user_id'=>$this->faker->randomDigit,
            'role_id'=>$this->faker->randomDigit,
            */
            'user_id' => 2,
            'role_id' =>1,
        ];
    }
}
