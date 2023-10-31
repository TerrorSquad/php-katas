<?php
declare(strict_types=1);

use App\ABeforeB;
use PHPUnit\Framework\TestCase;

class ABeforeBTest extends TestCase
{
    public static function checks()
    {
        return [
            ["a", true],
            ["ab", true],
            ["ba", false],
            ["aba", false],
            ["aab", true],
            ["aaaaababa", false],
            ["aaaa", true],
            ["b", true],
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function it_checks_if_a_is_before_b($input, $expected)
    {
        $this->assertEquals($expected, ABeforeB::check($input));
    }
}
