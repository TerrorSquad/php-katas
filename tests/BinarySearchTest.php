<?php
declare(strict_types=1);

use App\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{

    /**
     * @test
     */
    public static function it_checks_if_the_search_works(): void
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $binarySearch = new BinarySearch();
        $result = $binarySearch->search($array, 5);
        self::assertEquals(4, $result);
    }

    public static function checks(): array
    {
        return [
            [[9, 1], 1, 1, false],
            [[9, 1,], 9, 0, false],
            [[1, 9], 9, 1],
            [[1, 9,], 1, 0],
            [[9, 1], 10, -1, false],
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public static function it_checks_if_the_search_works_with_data_provider($array, $needle, $expected, $ascending = true)
    {
        $binarySearch = new BinarySearch();
        $result = $binarySearch->search($array, $needle, $ascending);
        self::assertEquals($expected, $result);
    }
}
