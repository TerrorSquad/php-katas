<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\ProductOfArrayExceptSelf;

class ProductOfArrayExceptItselfTest extends TestCase
{
    /**
     * @dataProvider
     */
    public static function products(): array
    {
        return [
            [[1, 2, 3], [6, 3, 2]],
            [[1, 2, 3, 4], [24, 12, 8, 6]],
            [[1, 2, 3, 4, 5], [120, 60, 40, 30, 24]],
            [[3, 2, 1], [2, 3, 6]],
            [[3, 2, 1, 4], [8, 12, 24, 6]],
            [[3, 2, 1, 4, 5], [40, 60, 120, 30, 24]],
            [[4, 4, 4, 4], [64, 64, 64, 64]],
        ];
    }

    /**
     * @test
     * @dataProvider products
     */
    public function it_returns_an_array_of_products_of_all_integers_except_itself($input, $expected)
    {

        $this->assertEquals($expected, ProductOfArrayExceptSelf::productExceptSelf($input));

    }
}
