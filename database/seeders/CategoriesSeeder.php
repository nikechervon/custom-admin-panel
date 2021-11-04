<?php

namespace Database\Seeders;

use App\Enums\Categories;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Categories::values() as $alias => $name) {
            Category::factory()->create([
                'name' => $name,
                'alias' => Str::lower($alias),
            ]);
        }
    }
}
