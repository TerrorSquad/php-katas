<?php
declare(strict_types=1);

namespace App;

class QuickSort
{

    /**
     * Sorts the given array using the quicksort algorithm.
     *
     * @param  array  $array  The array to be sorted.
     *
     * @return array The sorted array.
     */
    public function sort(array $array): array
    {

        if (count($array) <= 1) {
            return $array;
        }

        $pivotIndex = $this->selectPivot($array);

        $pivot = $array[$pivotIndex];
        $left = [];
        $right = [];
        // convert to a for loop and skip the pivot element......
        for ($i = 0; $i < count($array); $i++) {
            if ($i == $pivotIndex) {
                continue;
            }
            $item = $array[$i];
            if ($item < $pivot) {
                $left[] = $item;
            } else {
                $right[] = $item;
            }
        }


        $left = $this->sort($left);
        $right = $this->sort($right);

        return [...$left, $pivot, ...$right];
    }

    private function selectPivot(array $array): int
    {
        $leftIndex = 0;
        $rightIndex = count($array) - 1;
        $middleIndex = (int) (($leftIndex + $rightIndex) / 2);

        $left = $array[$leftIndex];
        $middle = $array[$middleIndex];
        $right = $array[$rightIndex];

        if ($left > $middle) {
            if ($middle > $right) {
                return $middleIndex;
            } else {
                return $rightIndex;
            }
        } else {
            if ($left > $right) {
                return $leftIndex;
            } else {
                return $middleIndex;
            }
        }
    }
}
