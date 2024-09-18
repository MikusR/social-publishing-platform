<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Uncategorized',
            'description' => 'Default Category',
        ]);
        Category::factory()->create([
            'name' => 'Technology',
            'description' => 'Everything about technology',
        ]);
        Category::factory()->create([
            'name' => 'Health',
            'description' => 'Posts about health',
        ]);
        Category::factory()->create([
            'name' => 'Lifestyle',
            'description' => 'Lifestyle and stuff',
        ]);
    }
}
