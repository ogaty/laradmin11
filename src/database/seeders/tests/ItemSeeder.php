<?php

namespace Database\Seeders\tests;

use App\Models\ChildItem;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $item = Item::factory()->create([
                'name' => '',
            ]);
            for ($j = 0; $j < 3; $j++) {
                ChildItem::create([
                    'item_id' => $item->id,
                    'flag1' => 1,
                    'flag2' => 1,
                ]);
            }
        }
    }
}
