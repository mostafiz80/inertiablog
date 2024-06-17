<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
        $user = User::inRandomOrder()->limit(1)->first();
        $category = Category::inRandomOrder()->limit(1)->first();
        $userid = $user->id;
        $categoryId = $category->id;
        return [
            'post_title' => fake()->text(50),
            'post_slug' => fake()->slug(),
            'post_content' => fake()->text(1000),
            'post_thumbnail' => "https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
            'post_views' => 44,
            'user_id' => $userid,
            'category_id' => $categoryId,
        ];
    }
}
