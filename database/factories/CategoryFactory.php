<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'category_image' => "https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=100",
            'category_slug' => Str::random(10),
        ];
    }
}
