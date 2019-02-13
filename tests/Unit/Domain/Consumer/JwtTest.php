<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Consumer;

use Gco\KongApiClient\Domain\Consumer\Jwt;
use Gco\KongApiClient\Tests\TestCase;

class JwtTest extends TestCase
{
    public function test_ShouldSignJwtToken()
    {
        $jwt = new Jwt(
            'bcbfb45d-e391-42bf-c2ed-94e32946753a',
            '7bce93e1-0a90-489c-c887-d385545f8f4b',
            'a36c3049b36249a3c9f8891cb127243c',
            'e71829c351aa4242c2719cbfbe671c09'
        );
        $tokenSigned = $jwt->sign();
        $expectedSigned = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhMzZjMzA0OWIzNjI0OWEzYzlmODg5MWNiMTI3MjQzYyJ9.5uUYhXpZ1H8tpWSmVqC3JPCiJCxB2aqL5PHGX_0jlOA';
        $this->assertEquals($expectedSigned, $tokenSigned);
    }
}