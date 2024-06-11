<?php

namespace Database\Seeders\tests;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $user = User::factory()->create([
                'password' => '',
            ]);

            UserDetail::create([
                'user_id' => $user->id,
                'flag1' => 1,
                'flag2' => 1,
            ]);
        }
    }
}
