<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Route;

use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Domain\Route\Route;
use Ramsey\Uuid\Uuid;

class CreateOkImplRouteRepository implements RouteRepositoryContract
{
    public function find(string $identity): ?Route
    {
        return null;
    }

    public function create(string $serviceId, array $params = []): array
    {
        return [
            "id" => Uuid::uuid4()->toString(),
            'name' => 'route-name'
        ];
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
        return [];
    }
}