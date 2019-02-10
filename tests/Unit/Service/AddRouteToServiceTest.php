<?php namespace Gco\KongApiClient\Tests\Unit\Service;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Route\Route;
use Gco\KongApiClient\Service\Configuration;
use Gco\KongApiClient\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\HttpClientRouteCreated;
use Ramsey\Uuid\Uuid;

class AddRouteToServiceTest extends TestCase
{
    public function test_ShouldAddARouteToTheService()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientRouteCreated::class));

        $configuration = new Configuration();
        $configuration->setUrl('http://example-service.com');
        $service = new Service($configuration, Uuid::uuid4());

        $routeConfiguration = new \Gco\KongApiClient\Route\Configuration();
        $routeConfiguration->setName('route-name')->setMethods(['POST']);

        $route = new Route($routeConfiguration);
        $isRoutesCreated = $service->addRoutes([$route]);

        $this->assertTrue($isRoutesCreated);
    }
}