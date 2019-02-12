<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Service;

use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Service\Configuration;
use Gco\KongApiClient\Domain\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Route\EmptyImplRouteRepository;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Route\GetRoutesServicesRouteRepository;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Service\EmptyImplServiceRepository;
use Ramsey\Uuid\Uuid;

class DeleteServiceTest extends TestCase
{
    public function test_ShouldDeleteServices_WhenNoRoutesAssociated()
    {
        $this->app->instance(ServiceRepositoryContract::class, app(EmptyImplServiceRepository::class));
        $this->app->instance(RouteRepositoryContract::class, app(EmptyImplRouteRepository::class));
        $serviceConfiguration = (new Configuration())->setUrl('http://example.com');
        $service = new Service($serviceConfiguration, Uuid::uuid4());
        $isServiceDeleted = $service->delete();
        $this->assertTrue($isServiceDeleted);
    }

    public function test_ShouldDeleteServicesAndRoutes_WhenRoutesAssociated()
    {
        $this->app->instance(ServiceRepositoryContract::class, app(EmptyImplServiceRepository::class));
        $this->app->instance(RouteRepositoryContract::class, app(GetRoutesServicesRouteRepository::class));
        $serviceConfiguration = (new Configuration())->setUrl('http://example.com');
        $service = new Service($serviceConfiguration, Uuid::uuid4());
        $isServiceDeleted = $service->delete();
        $this->assertTrue($isServiceDeleted);
    }
}