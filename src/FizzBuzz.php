<?php

declare(strict_types=1);

namespace App;

class FizzBuzz
{
    public static function convert(int $number): string
    {
        $result = '';
        if ($number % 3 === 0) {
            $result .= 'Fizz';
        }
        if ($number % 5 === 0) {
            $result .= 'Buzz';
        }
        return $result ?: (string) $number;
    }
}
