<?php
declare(strict_types=1);

use App\LargestSquare;
use PHPUnit\Framework\TestCase;

class LargestSquareTest extends TestCase
{
    public static function checks()
    {
        return [
            [
                [
                    ["Iris", "Iris", "Iris", "Iris", "Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Sage", "Sage", "Sage", "Sage", "Lily"],
                ], 16,
            ],

            [
                [
                    ["Larch", "Holly", "Holly", "Heath", "Holly", "Heath"],
                    ["Heath", "Pansy", "Holly", "Pansy", "Aspen", "Aspen"],
                    ["Pansy", "Pansy", "Larch", "Lilac", "Aspen", "Lilac"],
                    ["Hazel", "Lilac", "Basil", "Lilac", "Lilac", "Larch"],
                    ["Peony", "Hazel", "Basil", "Hazel", "Holly", "Basil"],
                ], 1,
            ],

            [
                [
                    ["Arum", "Dock", "Iris", "Lily", "Reed", "Rose", "Sage", "Woad"],
                ], 1,
            ],

            [
                [
                    ["Arum"],
                    ["Dock"],
                    ["Iris"],
                    ["Lily"],
                    ["Reed"],
                    ["Rose"],
                    ["Sage"],
                    ["Woad"],
                ], 1,
            ],

            [
                [
                    ["Peony"],
                ], 1,
            ],


            [
                [
                    ["Ivy", "Rue", "Yew", "Arum", "Dock"],
                    ["Iris", "Lily", "Reed", "Rose", "Sage"],
                    ["Woad", "Aspen", "Basil", "Hazel", "Heath"],
                    ["Holly", "Larch", "Lilac", "Pansy", "Peony"],
                ], 1,
            ],

            [
                [
                    ["Rose", "Rose", "Rose", "Rose", "Rose"],
                    ["Rose", "Rose", "Rose", "Rose", "Rose"],
                    ["Rose", "Rose", "Rose", "Rose", "Rose"],
                    ["Rose", "Rose", "Rose", "Rose", "Rose"],
                    ["Rose", "Rose", "Rose", "Rose", "Rose"],
                ], 25,
            ],

            [
                [
                    ["Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Rose"],
                ], 4,
            ],

            [
                [
                    ["Iris", "Iris", "Rose", "Rose", "Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Sage", "Sage", "Sage", "Sage", "Lily"],
                ], 16,
            ],

            [
                [
                    ["Iris", "Iris", "Iris", "Iris", "Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Rose"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Rose", "Rose", "Rose", "Rose", "Lily"],
                    ["Iris", "Iris", "Sage", "Sage", "Sage", "Sage", "Lily"],
                ], 16,
            ],

            [
                [
                    ["Iris", "Iris", "Iris"],
                    ["Iris", "Iris", "Iris"],
                    ["Lily", "Iris", "Iris"],
                ], 4,
            ],
        ];
    }

    /**
     * @dataProvider checks
     * @test
     */
    public function it_gets_largest_square($input, $output): void
    {
        $this->assertEquals($output, LargestSquare::getLargestSquare($input));
    }
}
