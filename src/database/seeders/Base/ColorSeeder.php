<?php

namespace Database\Seeders\Base;

use App\Models\Color;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $fp = fopen(base_path('database/seeders/Base/colors.csv'), 'r');
        while ($line = fgets($fp)) {
            $params = explode(',', $line);
            Color::create([
                'name' => $params[1],
                'code' => $params[2],
                'r' => $params[3],
                'g' => $params[4],
                'b' => $params[5],
            ]);
        }
    }
}
