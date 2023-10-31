<?php
declare(strict_types=1);

namespace App;

class MergeSort
{
    public function sort(array &$array): void
    {
        if (count($array) === 1) {
            return;
        }
        $mid = (int) (count($array) / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        $this->sort($left);
        $this->sort($right);

        $array = $this->mergeSort($left, $right);
    }

    private function mergeSort(array $left, array $right): array
    {
        $leftIndex = 0;
        $rightIndex = 0;
        $leftCount = count($left);
        $rightCount = count($right);

        $result = [];
        while ($leftIndex < $leftCount && $rightIndex < $rightCount) {
            if ($left[$leftIndex] > $right[$rightIndex]) {
                $result[] = $right[$rightIndex];
                $rightIndex++;
            } else {
                $result[] = $left[$leftIndex];
                $leftIndex++;
            }
        }
        while ($leftIndex < $leftCount) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }
        while ($rightIndex < $rightCount) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }

        return $result;
    }
}
