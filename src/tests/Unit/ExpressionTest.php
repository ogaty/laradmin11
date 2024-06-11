<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * 正規表現関連
 */
class ExpressionTest extends TestCase
{
    // RefreshDatabase不要

    /**
     * <span>1</span><span>2</span>から1を取り出す
     */
    public function test_expression1(): void
    {
        preg_match("|<span>(.+?)</span>|", "<span>1</span><span>2</span>", $match);
        // 文字列になる
        $this->assertSame("1", $match[1]);

        // divで挟んでトップノードを作成
        $xml = simplexml_load_string("<div><span>1</span><span>2</span></div>");
        $this->assertSame("1", (string)$xml->children()[0]);
    }
}
