<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            // // 'dep_id' => $this->faker->int,
        //'role_id' => $this->faker->text,
        'name' =>$this->faker->sentence,
        'dep_id' =>$this->faker->randomDigit,
        ];
    }
}
