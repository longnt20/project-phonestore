<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passport>
 */
class PassportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id'=>rand(1,30),
            'passport_number'=>fake()->buildingNumber,
            'issued_date'=>fake()->date,
            'expiry_date'=>fake()->date,
        ];
    }
}
