<?php

declare(strict_types=1);

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    public static function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [20, 'XX'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [2018, 'MMXVIII'],
            [1999, 'MCMXCIX'],
            [999, 'CMXCIX'],
            [1600, 'MDC'],
            [1601, 'MDCI'],
            [1602, 'MDCII'],
            [1603, 'MDCIII'],
            [1604, 'MDCIV'],
            [1605, 'MDCV'],
            [1606, 'MDCVI'],
            [1607, 'MDCVII'],
            [1608, 'MDCVIII'],
            [1609, 'MDCIX'],
            [1610, 'MDCX'],
            [1611, 'MDCXI'],
            [1612, 'MDCXII'],
            [1613, 'MDCXIII'],
            [1614, 'MDCXIV'],
            [1615, 'MDCXV'],
            [1616, 'MDCXVI'],
            [1617, 'MDCXVII'],
            [1618, 'MDCXVIII'],
            [1619, 'MDCXIX'],
            [1620, 'MDCXX'],
            [1621, 'MDCXXI'],
            [1622, 'MDCXXII'],
            [1623, 'MDCXXIII'],
            [1624, 'MDCXXIV'],
            [1625, 'MDCXXV'],
            [1626, 'MDCXXVI'],
            [1627, 'MDCXXVII'],
            [1628, 'MDCXXVIII'],
            [1629, 'MDCXXIX'],
            [1630, 'MDCXXX'],
            [1631, 'MDCXXXI'],
            [1632, 'MDCXXXII'],
            [1633, 'MDCXXXIII'],
            [1634, 'MDCXXXIV'],
            [1635, 'MDCXXXV'],
            [1636, 'MDCXXXVI'],
            [1637, 'MDCXXXVII'],
            [1638, 'MDCXXXVIII'],
            [1639, 'MDCXXXIX'],
            [1640, 'MDCXL'],
            [1641, 'MDCXLI'],
            [1642, 'MDCXLII'],
            [1643, 'MDCXLIII'],
            [1644, 'MDCXLIV'],
            [1645, 'MDCXLV'],
            [1646, 'MDCXLVI'],
            [3999, 'MMMCMXCIX']
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function it_generates_the_roman_numeral($number, $numeral)
    {
        $this->assertEquals($numeral, RomanNumerals::generate(4000));
    }

    /** @test */
    public function it_cannot_generate_for_less_than_1(): void
    {
        $this->assertEquals('', RomanNumerals::generate(0));
    }

    /** @test */
    public function it_cannot_generate_for_more_than_3999(): void
    {
        $this->assertEquals('', RomanNumerals::generate(4000));
    }

}
