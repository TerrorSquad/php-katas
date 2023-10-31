<?php

declare(strict_types=1);

namespace App;

class Song
{
    public function sing(): string
    {
        return $this->verses(99, 0);
    }

    public function verses($start, $end)
    {
        return implode("\n", array_map(fn($verse) => $this->verse($verse), range($start, $end)));
    }

    public function verse($number): string
    {
        return match ($number) {
            2 => $this->twoVerse(),
            1 => $this->oneVerse(),
            0 => $this->zeroVerse(),
            default => $this->defaultVerse($number),
        };
    }

    /**
     * @return string
     */
    private function twoVerse(): string
    {
        return "2 bottles of beer on the wall\n" .
            "2 bottles of beer\n" .
            "Take one down and pass it around\n" .
            "1 bottle of beer on the wall\n";
    }

    /**
     * @return string
     */
    private function oneVerse(): string
    {
        return "1 bottle of beer on the wall\n" .
            "1 bottle of beer\n" .
            "Take one down and pass it around\n" .
            "No more bottles of beer on the wall\n";
    }

    /**
     * @return string
     */
    private function zeroVerse(): string
    {
        return "No more bottles of beer on the wall\n" .
            "No more bottles of beer\n" .
            "Go to the store and buy some more\n" .
            "99 bottles of beer on the wall\n";
    }

    /**
     * @param $number
     * @return string
     */
    private function defaultVerse($number): string
    {
        return "$number bottles of beer on the wall\n" .
            "$number bottles of beer\n" .
            "Take one down and pass it around\n" .
            ($number - 1) . " bottles of beer on the wall\n";
    }
}
