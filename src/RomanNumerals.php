<?php

declare(strict_types=1);

namespace App;

class RomanNumerals
{

    const NUMERALS = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    /**
     * @param int $number
     * @return string|bool
     *
     * Generates a Roman numeral from an integer. Returns false if the integer is less than 1 or greater than 3999.
     */
    public static function generate(int $number): string|bool
    {
        if ($number < 1 || $number >= 4000) {
            return false;
        }

        $result = '';

        foreach (self::NUMERALS as $arabic => $roman) {
            for (; $number >= $arabic; $number -= $arabic) {
                $result .= $roman;
            }
        }

        return $result;
    }

}
