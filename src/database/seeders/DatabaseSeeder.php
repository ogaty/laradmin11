<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Base\NewsSeeder;
use Database\Seeders\Base\NewsCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(NewsSeeder::class);
        $this->call(NewsCategorySeeder::class);
    }
}
