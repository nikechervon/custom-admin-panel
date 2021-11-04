<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Roles::values() as $alias => $name) {
            Role::factory()->create([
                'name' => $name,
                'alias' => Str::lower($alias),
            ]);
        }
    }
}
