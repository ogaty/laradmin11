<?php

namespace Tests\Unit;

use App\Models\ChildItem;
use App\Models\Item;
use App\Models\User;
use Database\Seeders\tests\ItemSeeder;
use Database\Seeders\tests\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
        $this->seed(ItemSeeder::class);
    }

    /**
     * UserSeeder
     * @return void
     */
    public function test_user(): void
    {
        $this->assertCount(3, User::all()->toArray());
    }

    /**
     * ItemSeeder
     * @return void
     */
    public function test_item(): void
    {
        $this->assertCount(3, Item::all()->toArray());
        $this->assertCount(9, ChildItem::all()->toArray());
    }
}
