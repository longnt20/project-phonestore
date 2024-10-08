<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name,
            'last_name'=>fake()->name,
            'email'=>fake()->email,
            'phone'=>fake()->unique()->phoneNumber(),
            'date_of_birth'=>fake()->date,
            'hire_date'=>fake()->dateTime,
            'salary'=>rand(5000000,10000000),
            'is_active'=>rand(0,1),
            'department_id'=>rand(1,3),
            'manager_id'=>rand(1,3),
            'address'=>fake()->address,
        ];
    }
}
