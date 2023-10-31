<?php

declare(strict_types=1);

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function it_evaluates_an_empty_string_as_zero()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(""));
    }

    /** @test */
    public function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add("5"));
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(6, $calculator->add("5,1"));
    }

    /** @test */
    public function it_finds_the_sum_of_any_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add("5,1,1,1,1,1"));
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers_with_semicolon_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertSame(15, $calculator->add("6;9"));
    }

    /** @test */
    public function it_accepts_newline_character_as_a_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(10, $calculator->add("5\n5"));
    }

    /** @test */
    public function it_throws_an_exception_for_negative_numbers()
    {
        $calculator = new StringCalculator();

        $this->expectException(Exception::class);

        $calculator->add("5\n-15");
    }

    /** @test */
    public function numbers_greater_than_1000_are_ignored()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add("5,1001"));
    }

    /** @test */
    public function it_supports_a_custom_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertSame(14, $calculator->add("//p\n5p8p1"));
    }

    /** @test */
    public function it_supports_a_custom_delimiter_2()
    {
        $calculator = new StringCalculator();

        $this->assertSame(14, $calculator->add("//-\n5-8-1"));
    }
}
