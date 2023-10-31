<?php

declare(strict_types=1);

namespace App;

class IsUnique
{
    public static function isUnique(string $string): bool
    {
        $chars = str_split($string);
        $uniqueChars = array_unique($chars);
        return count($chars) === count($uniqueChars);
    }

    public function getPermutations(string $input)
    {
        $permutations = [];
        $chars = str_split($input);
        $this->permute($chars, 0, count($chars) - 1, $permutations);
        return $permutations;
    }

    private function permute(array &$chars, int $start, int $end, array &$permutations)
    {
        if ($start === $end) {
            $permutations[] = implode('', $chars);
        } else {
            for ($i = $start; $i <= $end; $i++) {
                $this->swap($chars, $start, $i);
                $this->permute($chars, $start + 1, $end, $permutations);
                $this->swap($chars, $start, $i);
            }
        }
    }

    private function swap(array &$chars, int $index1, int $index2)
    {
        $temp = $chars[$index1];
        $chars[$index1] = $chars[$index2];
        $chars[$index2] = $temp;
    }
}
