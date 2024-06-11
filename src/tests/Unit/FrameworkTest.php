<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Finder;
use Tests\TestCase;

/**
 * フレームワーク内の組み込み関数スニペット
 */
class FrameworkTest extends TestCase
{
    // RefreshDatabase不要

    protected function tearDown(): void
    {
        Storage::disk("local")->deleteDirectory("unittest");
        parent::tearDown();
    }

    /**
     * Symfony Finder
     * @return void
     *
     * @see https://symfony.com/doc/current/components/finder.html
     */
    public function test_Finder(): void
    {
        Storage::disk("local")->deleteDirectory("unittest");
        Storage::disk("local")->makeDirectory("unittest");
        Storage::disk("local")->makeDirectory("unittest/1");
        Storage::disk("local")->makeDirectory("unittest/1/1");
        Storage::disk("local")->makeDirectory("unittest/2");
        Storage::disk("local")->put("unittest/test.txt", "test");
        Storage::disk("local")->put("unittest/1/test.txt", "test");
        Storage::disk("local")->put("unittest/1/1/test.txt", "test");
        Storage::disk("local")->put("unittest/2/test.txt", "test");

        // 再帰的に検索できるイテレータ
        $finder = Finder::create()->files()->exclude('.gitignore')->in(storage_path('app/unittest'));
        $this->assertSame(4, $finder->count());
    }
}
