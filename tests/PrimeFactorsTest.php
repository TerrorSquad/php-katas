<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     */
    function it_generates_prime_factors_for_n($number, $expectedFactors)
    {
        $primeFactors = new PrimeFactors;

        $this->assertEquals($expectedFactors, $primeFactors->generate($number));
    }

    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [39, [3, 13]],
            [100, [2, 2, 5, 5]],
            [1000, [2, 2, 2, 5, 5, 5]],
        ];
    }
}
