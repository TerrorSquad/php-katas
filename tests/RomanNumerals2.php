<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class RomanNumerals2 extends TestCase
{
    /**
     * @dataProvider checks
     */
    public function checks()
    {
        return [
            [1, "I"],
            [2, "II"],
            [3, "III"],
            [4, "IV"],
            [5, "V"],
            [6, "VI"],
            [7, "VII"],
            [8, "VIII"],
            [9, "IX"],
            [10, "X"],
            [11, "XI"],
            [20, "XX"],
            [30, "XXX"],
            [40, "XL"],
            [41, "XLI"],
            [42, "XLII"],
            [43, "XLIII"],
            [44, "XLIV"],
            [45, "XLV"],
            [46, "XLVI"],
            [47, "XLVII"],
            [48, "XLVIII"],
            [49, "XLIX"],
            [50, "L"],
            [100, "C"],
            [200, "CC"],
            [300, "CCC"],
            [400, "CD"],
            [500, "D"],
            [600, "DC"],
            [700, "DCC"],
            [800, "DCCC"],
            [900, "CM"],
            [1000, "M"],
            [1001, "MI"],
            [1100, "MC"],
            // add more tests here
            [1999, "MCMXCIX"],

            [2000, "MM"],
            [2500, "MMD"],
            [3000, "MMM"],
            [3333, "MMMCCCXXXIII"],
            [3999, "MMMCMXCIX"],
            [4000, "MMMM"],
            [3333, "MMMCCCXXXIII"],
            [3000, "MMM"],
            [3999, "MMMCMXCIX"],
            [4000, "MMMM"],
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function testToNumeral($number, $numeral)
    {
        $obj = new App\RomanNumerals2();

        $this->assertEquals($numeral, $obj->toNumeral($number));
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function testToNumber($number, $numeral)
    {
        $obj = new App\RomanNumerals2();

        $this->assertEquals($number, $obj->toNumber($numeral));
    }
}
