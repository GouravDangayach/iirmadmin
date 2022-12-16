<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => 'IIrm Jaipur',
            "description" => 'IIrm jaipur Eduaction Group',
            "link" => "https://www.iirm.ac.in/",
            "photo" => "Service description ...",
        ];
    }
}
