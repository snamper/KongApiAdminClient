<?php namespace Gco\KongApiClient\Tests\Unit\Consumer;

use Gco\KongApiClient\Consumer\Consumer;
use Gco\KongApiClient\Consumer\Jwt;
use Gco\KongApiClient\Exceptions\InvalidConsumerInput;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Consumer\HttpClientCreated;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Consumer\HttpClientJwtCreated;

class ConsumerTest extends TestCase
{
    public function test_ShouldNotCreateAConsumer_WhenNameAndCustomIdNotProvided()
    {
        $this->expectException(InvalidConsumerInput::class);
        new Consumer();
    }

    public function test_ShouldCreateAConsumer()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientCreated::class));
        $consumer = new Consumer('David Bowie', 1);
        $isConsumerCreated = $consumer->create();
        $this->assertTrue($isConsumerCreated);
    }

    public function test_ShouldCreateAJwtToken()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientJwtCreated::class));
        $consumer = new Consumer('David Bowie', 1, "7bce93e1-0a90-489c-c887-d385545f8f4b");
        $jwt = $consumer->createJwtToken();
        $this->assertInstanceOf( Jwt::class, $jwt);
    }
}