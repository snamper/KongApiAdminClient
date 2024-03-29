<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Service;

use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Domain\Route\Route;
use Gco\KongApiClient\Domain\Service\Configuration;
use Gco\KongApiClient\Domain\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Route\CreateOkImplRouteRepository;
use Ramsey\Uuid\Uuid;

class AddRouteToServiceTest extends TestCase
{
    public function test_ShouldAddARouteToTheService()
    {
        $this->app->instance(RouteRepositoryContract::class, app(CreateOkImplRouteRepository::class));

        $configuration = new Configuration();
        $configuration->setUrl('http://example-service.com');
        $service = new Service($configuration, Uuid::uuid4());

        $routeConfiguration = new \Gco\KongApiClient\Domain\Route\Configuration();
        $routeConfiguration->setName('route-name')->setMethods(['POST']);

        $route = new Route($routeConfiguration);
        $isRoutesCreated = $service->addRoutes([$route]);

        $this->assertTrue($isRoutesCreated);
    }

    /**
     * ajouter un test si l'id autogenerated ou name n'est pas setté lors de la creation
     */
}