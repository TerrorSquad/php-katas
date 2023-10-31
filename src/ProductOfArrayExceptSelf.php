<?php

declare(strict_types=1);

namespace App;

class ProductOfArrayExceptSelf
{
    public static function productExceptSelf(array $nums): array
    {
        $left = array_fill(0, count($nums), 1);
        $right = array_fill(0, count($nums), 1);
        $result = array_fill(0, count($nums), 1);

        for ($i = 1; $i < count($nums); $i++) {
            $left[$i] = $left[$i - 1] * $nums[$i - 1];
        }

        for ($i = count($nums) - 2; $i >= 0; $i--) {
            $right[$i] = $right[$i + 1] * $nums[$i + 1];
        }

        for ($i = 0; $i < count($nums); $i++) {
            $result[$i] = $left[$i] * $right[$i];
        }

        return $result;
    }
}


