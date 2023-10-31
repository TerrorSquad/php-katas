<?php
declare(strict_types=1);

use App\OpenAPIValidator;
use PHPUnit\Framework\TestCase;

class OpenAPIValidatorTest extends TestCase
{
    public static function checks()
    {
        return [
            ['{"cart":[{"productId":"123123123","quantity":1}]}', ['NO_USER_ID_FIELD']],
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function it_validates_contract_missing_user_id($contract, $expected)
    {
        $validator = new OpenAPIValidator();
        $actual = $validator->validate($contract);
        sort($expected);
        sort($actual);
        $this->assertEquals($expected, $actual);
    }
}
