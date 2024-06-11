<?php

namespace Tests\Unit;

use App\Util\Util;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Unilクラス
 */
class UtilTest extends TestCase
{
    // RefreshDatabase不要

    /**
     * getValue
     * @see Util::getValue()
     */
    public function test_array(): void
    {
        // キーがあれば正しく返る
        $result = Util::getValue('aaa', ['aaa' => 1]);
        $this->assertSame(1, $result);
        // キーが無ければnullになる
        $result = Util::getValue('aaa', []);
        $this->assertSame(null, $result);
        // キーがnullならnullになる
        $result = Util::getValue('aaa', ['aaa' => null]);
        $this->assertSame(null, $result);
    }

    /**
     * @return void
     * @see Util::findIndex()
     */
    public function test_findIndex(): void
    {
        $result = Util::findIndex(5, range(1, 20));
        $this->assertSame(4, $result);
    }

    /**
     * month
     * @return void
     * @see Util::getLastDayOfNextMonth()
     */
    public function test_calendar(): void
    {
        $result = Util::getLastDayOfNextMonth('2027-01-31');
        $this->assertSame('2027-02-28', $result->format('Y-m-d'));
        $result = Util::getLastDayOfNextMonth('2028-01-31');
        $this->assertSame('2028-02-29', $result->format('Y-m-d'));
    }

    /**
     * isNullOrEmpty
     * @return void
     * @see Util::isNullOrEmpty()
     */
    public function test_nullOrEmpty(): void
    {
        $result = Util::isNullOrEmpty("");
        $this->assertTrue($result);

        $result = Util::isNullOrEmpty();
        $this->assertTrue($result);

        $result = Util::isNullOrEmpty("a");
        $this->assertFalse($result);
    }

    /**
     * running
     * @return void
     * @see Util::running()
     */
    public function test_running(): void
    {
        $result = Util::running();
        $this->assertSame(1, $result);
    }
}
