<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Portfoliocategory::inRandomOrder()->limit(1)->first();
        Portfolio::factory(10)->create([
            'title' => fake()->text(50),
            'image' => "url",
            'framework' => fake()->text(10),
            'portfoliocategory_id' => $category->id,
        ]);
    }
}
