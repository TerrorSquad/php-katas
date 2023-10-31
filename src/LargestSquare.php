<?php
declare(strict_types=1);

namespace App;

class LargestSquare
{
    public static function getLargestSquare(array $matrix): int
    {
        $squares = self::getValidSquares($matrix);

        $largestSquare = array_reduce($squares, function ($carry, $item) {
            return count($item) > count($carry) ? $item : $carry;
        }, []);

        return count($largestSquare) * count($largestSquare);
    }

    private static function getValidSquares(array $matrix): array
    {
        $squares = self::extractAllSquares($matrix);
        return array_filter($squares, [LargestSquare::class, 'isValidSquare']);
    }

    private static function extractAllSquares($matrix): array
    {
        $squares = [];

        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[$i]); $j++) {
                $maxLength = min(count($matrix) - $i, count($matrix[$i]) - $j);
                for ($k = 1; $k <= $maxLength; $k++) {
                    $square = self::extractSquare($matrix, [$i, $j], $k);
                    if ($square) {
                        $squares[] = $square;
                    }
                }
            }
        }

        return $squares;
    }

    private static function extractSquare(array $matrix, array $topLeftIndices, int $width): array|bool
    {
        if (count($matrix) < $width) {
            return false;
        }

        if (count($matrix[0]) < $width) {
            return false;
        }

        $rowIndex = $topLeftIndices[0];
        if ($rowIndex + $width > count($matrix)) {
            return false;
        }

        $columnIndex = $topLeftIndices[1];
        if ($columnIndex + $width > count($matrix[0])) {
            return false;
        }

        $square = [];

        for ($i = 0; $i < $width; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $square[$i][$j] = $matrix[$rowIndex + $i][$columnIndex + $j];
            }
        }

        return $square;
    }

    private static function isValidSquare($matrix): bool
    {
        if (!self::isSquare($matrix)) {
            return false;
        }

        $firstElement = $matrix[0][0];

        foreach ($matrix as $row) {
            foreach ($row as $cell) {
                if ($cell !== $firstElement) {
                    return false;
                }
            }
        }

        return true;
    }

    public static function isSquare($matrix): bool
    {
        return count($matrix) == count($matrix[0]);
    }
}
