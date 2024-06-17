<?php

namespace Database\Seeders;

use App\Models\Portfoliocategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Portfoliocategory::factory(10)->create([
            'name' => fake()->text(50),
        ]);
    }
}
