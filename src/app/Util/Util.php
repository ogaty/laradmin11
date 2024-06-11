<?php

namespace App\Util;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Tests\Unit\UtilTest;

/**
 * 基本static関数で構成
 * このPJとかLaravelに限らずどこへ持っていっても使えるように
 */
class Util
{
    /**
     * array内の特定のキーを取り出す、キーがない場合はnullが返る
     * isset()と組み合わせる必要がない
     * @param string $key
     * @param array  $a
     * @return int|string|object|array|null
     * @see UtilTest::test_array()
     */
    public static function getValue(string $key, array $a): int|string|object|array|null
    {
        return Arr::get($a, $key);
    }

    /**
     * 配列から指定したキーのindexを取得
     * @param int|string $value
     * @param array $a
     * @return int
     * @see UtilTest::test_findIndex()
     */
    public static function findIndex(int|string $value, array $a): int
    {
        $collection = collect($a);
        return $collection->search($value);
    }

    /**
     * 翌月最終日を求める
     * @param string $ymd 2000-01-31
     * @return Carbon 2000-02-28
     * @see UtilTest::test_calendar()
     */
    public static function getLastDayOfNextMonth(string $ymd): Carbon
    {
        return Carbon::parse($ymd)->firstOfMonth()->addMonth()->endOfMonth();
    }

    /**
     * nullか空文字ならtrueを返す
     * @param string $s
     * @return bool
     * @see UtilTest::test_nullOrEmpty()
     */
    public static function isNullOrEmpty(string $s = null): bool
    {
        if (is_null($s)) {
            return true;
        }
        if (mb_strlen($s) == 0) {
            return true;
        }

        return false;
    }

    /**
     * どこから起動されたか
     * @return int
     * @see UtilTest::test_running()
     */
    public static function running(): int
    {
        if (app()->runningUnitTests()) {
            return 1;
        }
        if (app()->runningInConsole()) {
            return 2;
        }
        return 0;
    }
}
