<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rolepermission>
 */
class RolepermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /*'role_id'=>$this->faker->randomDigit,
            'permission_id'=>$this->faker->randomDigit,
            */
            'role_id' => 1,
            'permission_id' =>3,
        ];
    }
}
