<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 'dep_id' => $this->faker->int,
        //'role_id' => $this->faker->text,
        return [
            'value' => $this->faker->sentence,
            'active' =>$this->faker->randomDigit,
        ];
    }
}
