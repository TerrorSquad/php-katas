<?php

declare(strict_types=1);

namespace App;

use Exception;

class StringCalculator
{

    public const MAX_NUMBER_ALLOWED = 1000;

    /**
     * @param string $numbers
     * @return int
     * @throws Exception
     */
    public function add(string $numbers): int
    {
        $numbers = $this->getParsedNumbers($numbers);
        $numbers = $this->ignoreNumbersGreaterThan1000($numbers);
        return $this->getSumOfMultipleNumbers($numbers);
    }

    /**
     * @param string $numbers
     * @return array
     */
    public function getParsedNumbers(string $numbers): array
    {
        if ($this->isUsingCustomDelimiter($numbers)) {
            $split = preg_split("/\\n/", $numbers);
            $delimiter = str_replace("//", "", $split[0]);
            $numbers = $split[1];
        } else {
            $delimiter = $this->getDelimiter($numbers);
        }

        if (isset($delimiter)) {
            return explode($delimiter, $numbers);
        }

        return $numbers === '' ? [] : [$numbers];
    }

    /**
     * @param string $numbers
     * @return bool
     */
    public function isUsingCustomDelimiter(string $numbers): bool
    {
        return str_starts_with($numbers, "//");
    }

    /**
     * @param string $numbers
     * @return string|null
     */
    public function getDelimiter(string $numbers): ?string
    {
        $regex = "/[,;]|\\n/";
        preg_match($regex, $numbers, $matches);

        if (count($matches) > 0) {
            return $matches[0];
        }
        return null;
    }

    private function ignoreNumbersGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }

    /**
     * @param array $arrayOfNumbers
     * @return int
     * @throws Exception
     */
    public function getSumOfMultipleNumbers(array $arrayOfNumbers): int
    {
        $sum = 0;
        foreach ($arrayOfNumbers as $number) {
            if ($number < 0) {
                throw new Exception("Negative numbers are not allowed.");
            }
            $sum += $number;
        }
        return $sum;
    }

}
