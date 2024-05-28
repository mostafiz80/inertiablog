<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_title' => fake()->title(),
            'post_slug' => fake()->slug(),
            'post_excerpt' => fake()->text(30),
            'post_content' => fake()->text(200),
            'post_thumbnail' => "https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
            'post_views' => 44,
            'user_id' => 4,
            'category_id' => 4,
        ];
    }
}
