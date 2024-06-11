<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * php標準関数の挙動確認
 */
class BasicTest extends TestCase
{
    // RefreshDatabase不要

    /**
     * emptyFunction
     * @return void
     *
     * @see https://www.php.net/manual/ja/function.empty.php
     */
    public function test_emptyFunction(): void
    {
        // emptyはこれに注意
        $result = empty(0);
        $this->assertTrue($result);

        $result = empty([]);
        $this->assertTrue($result);

        $result = empty([1]);
        $this->assertFalse($result);

        $result = empty("");
        $this->assertTrue($result);

        $s = null;
        $result = empty($s);
        $this->assertTrue($result);

        $result = empty("a");
        $this->assertFalse($result);
    }

    /**
     * パス関連
     * @return void
     *
     * @see https://www.php.net/manual/ja/function.basename
     * @see https://www.php.net/manual/ja/function.dirname
     * @see https://www.php.net/manual/ja/function.pathinfo
     */
    public function test_path(): void
    {
        $path = "tmp/aaaa/bbbb/cccc.txt";
        $base = basename($path);
        $this->assertSame("cccc.txt", $base);

        $dirName = dirname($path);
        $this->assertSame("tmp/aaaa/bbbb", $dirName);

        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $this->assertSame("txt", $extension);

        // これはLaravelのヘルパー
        $base = base_path($path);
        $this->assertSame("/var/www/html/tmp/aaaa/bbbb/cccc.txt", $base);
    }

}
