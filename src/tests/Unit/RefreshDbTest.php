<?php

namespace Tests\Unit;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Depends;
use Tests\TestCase;

/**
 * LaravelのDatabase関連
 */
class RefreshDbTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // insertだとid固定
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'default name',
            'email' => 'test@example.com',
            'password' => '12341234'
        ]);
        // createだとRefreshDBでidがインクリメントされる
        News::create([
            'title' => 'title',
            'news_category_id' => 1,
        ]);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @return void
     *
     * @see https://symfony.com/doc/current/components/finder.html
     */
    public function test_setUp(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @return void
     *
     * @see https://symfony.com/doc/current/components/finder.html
     */
    #[Depends('test_setUp')]
    public function test_setUp2(): void
    {
        $user = User::all()->first();
        // insertなので1固定
        $this->assertSame(1, $user->id);
        $news = News::all()->first();
        // transaction解除後もauto_incrementは継続
        $this->assertNotSame(1, $news->id);
    }
}
