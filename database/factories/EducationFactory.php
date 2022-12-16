<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "institution" => 'Rajasthan University',
            "period" => '2009-2012',
            "degree" => "Bachlor of Computer Application",
            "department" => "Computer Science",
        ];
    }
}
