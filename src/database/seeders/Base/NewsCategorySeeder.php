<?php

namespace Database\Seeders\Base;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        NewsCategory::create([
            'name' => '新商品',
        ]);
        NewsCategory::create([
            'name' => 'キャンペーン',
        ]);
        NewsCategory::create([
            'name' => 'お知らせ',
        ]);
    }
}
