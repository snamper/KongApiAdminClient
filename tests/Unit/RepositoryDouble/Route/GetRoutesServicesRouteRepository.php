<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Route;

use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Domain\Route\Configuration;
use Gco\KongApiClient\Domain\Route\Route;

class GetRoutesServicesRouteRepository implements RouteRepositoryContract
{
    public function find(string $identity):? Route
    {
        return null;
    }

    public function create(string $serviceId, array $params = []): array
    {
        return [];
    }

    public function update(string $identity, array $params): array
    {
        return [];
    }

    public function delete(string $identity): bool
    {
        return true;
    }

    public function findRoutesByService(string $serviceId): array
    {
        $configuration = new Configuration();
        $configuration->setName('route');
        return [
            new Route($configuration, '123456', 'route'),
            new Route($configuration, '1234567', 'route')
        ];
    }
}