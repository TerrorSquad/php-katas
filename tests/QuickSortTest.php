<?php
declare(strict_types=1);

use App\QuickSort;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
{
    /**
     * @test
     */
    public static function it_tests_sorting_a_known_array()
    {
        $unsortedArray = [939, 627, 100, 246, 599, 746, 112, 327, 800, 341, 519, 538, 916, 482, 400, 703, 914, 319, 988, 395];
        $sortedArray = [100, 112, 246, 319, 327, 341, 395, 400, 482, 519, 538, 599, 627, 703, 746, 800, 914, 916, 939, 988];

        $quickSort = new QuickSort();
        $unsortedArray = $quickSort->sort($unsortedArray);
        self::assertEquals($sortedArray, $unsortedArray);
    }

    /**
     * @test
     */
    public static function it_tests_sorting_a_generated_array()
    {
        $array = self::generateArray(50);
        $arrayCopy = self::copyArray($array);

        $quickSort = new QuickSort();
        $array = $quickSort->sort($array);
        sort($arrayCopy);

        self::assertEquals($arrayCopy, $array);
    }

    private static function generateArray(int $int)
    {
        $array = [];
        for ($i = 0; $i < $int; $i++) {
            $array[] = random_int(1, 1000);
        }
        return $array;

    }

    private static function copyArray($array)
    {
        $newArray = [];
        foreach ($array as $item) {
            $newArray[] = $item;
        }
        return $newArray;
    }
}
