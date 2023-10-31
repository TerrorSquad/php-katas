<?php

declare(strict_types=1);

use App\FizzBuzz;

class FizzBuzzTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_returns_fizz_for_multiple_of_three()
    {
        foreach ([3, 6, 9, 12] as $number) {
            $this->assertEquals('Fizz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_buzz_for_multiple_of_five()
    {
        foreach ([5, 10, 20, 25] as $number) {
            $this->assertEquals('Buzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_fizzbuzz_for_multiple_of_three_and_five()
    {
        foreach ([15, 30, 45, 60] as $number) {
            $this->assertEquals('FizzBuzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_the_original_number_if_not_divisible_by_three_or_five()
    {
        foreach ([1, 2, 4, 7, 8, 11, 13, 14] as $number) {
            $this->assertEquals((string) $number, FizzBuzz::convert($number));
        }
    }
}
