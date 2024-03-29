<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => 'Gourav',
            "email" => 'gouravdnagayach@gmail.com',
            "subject" => "Check New Sample",
            "description" => "Service description ...",
            "status" => '0',
        ];
    }
}
