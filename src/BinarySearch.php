<?php
declare(strict_types=1);

namespace App;

class BinarySearch
{
    /**
     * Searches through the sorted array $haystack to find the index of the $needle.
     *
     * If the needle is not preset, it returns -1.
     *
     * @param  array  $haystack  of numbers to search
     * @param  number  $needle  to search for
     *
     * @return int  index of the $needle
     */
    public function search(array $haystack, $needle, $ascending = true): int
    {
        if (count($haystack) == 0) {
            return -1;
        }

        $startIndex = 0;
        $endIndex = count($haystack) - 1;

        while ($startIndex <= $endIndex) {
            $middleIndex = (int) (($startIndex + $endIndex) / 2);
            if ($haystack[$middleIndex] == $needle) {
                return $middleIndex;
            }
            if ($ascending) {
                if ($haystack[$middleIndex] < $needle) {
                    // right side
                    $startIndex = $middleIndex + 1;
                } else {
                    // left side
                    $endIndex = $middleIndex - 1;
                }
            } else {
                if ($haystack[$middleIndex] > $needle) {
                    // right side
                    $startIndex = $middleIndex + 1;
                } else {
                    // left side
                    $endIndex = $middleIndex - 1;
                }
            }

        }
        return -1;
    }
}
