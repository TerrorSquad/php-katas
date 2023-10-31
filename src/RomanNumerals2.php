<?php
declare(strict_types=1);

namespace App;

class RomanNumerals2
{
    private $numerals = [
        1000 => "M",
        900 => "CM",
        500 => "D",
        400 => "CD",
        100 => "C",
        90 => "XC",
        50 => "L",
        40 => "XL",
        10 => "X",
        9 => "IX",
        5 => "V",
        4 => "IV",
        1 => "I",
    ];

    public function toNumeral(int $number)
    {
        $result = "";

        foreach ($this->numerals as $decimal => $numeral) {
            while ($number >= $decimal) {
                $result .= $numeral;
                $number -= $decimal;
            }
        }

        return $result;
    }

    public function toNumber(string $inputNumeral)
    {
        $result = 0;

        foreach ($this->numerals as $decimal => $numeral) {
            while (strpos($inputNumeral, $numeral) === 0) {
                $result += $decimal;
                $inputNumeral = substr($inputNumeral, strlen($numeral));
            }
        }

        return $result;
    }
}


$obj = new RomanNumerals2();

echo $obj->toNumeral(1);
