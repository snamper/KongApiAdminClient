<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Consumer;

use Gco\KongApiClient\Domain\Consumer\Consumer;
use Gco\KongApiClient\Domain\Consumer\Jwt;
use Gco\KongApiClient\Exceptions\InvalidConsumerInput;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Consumer\CreateJwtTokenOkImplConsumerRepository;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Consumer\CreateOkImplConsumerRepository;

class ConsumerTest extends TestCase
{
    public function test_ShouldNotCreateAConsumer_WhenNameAndCustomIdNotProvided()
    {
        $this->expectException(InvalidConsumerInput::class);
        new Consumer();
    }

    public function test_ShouldCreateAConsumer()
    {
        $this->app->instance(ConsumerRepositoryContract::class, app(CreateOkImplConsumerRepository::class));
        $consumer = new Consumer('David Bowie', 1);
        $isConsumerCreated = $consumer->create();
        $this->assertTrue($isConsumerCreated);
    }

    public function test_ShouldCreateAJwtToken()
    {
        $this->app->instance(ConsumerRepositoryContract::class, app(CreateJwtTokenOkImplConsumerRepository::class));
        $consumer = new Consumer('David Bowie', 1, "7bce93e1-0a90-489c-c887-d385545f8f4b");
        $jwt = $consumer->createJwtToken();
        $this->assertInstanceOf( Jwt::class, $jwt);
    }
}