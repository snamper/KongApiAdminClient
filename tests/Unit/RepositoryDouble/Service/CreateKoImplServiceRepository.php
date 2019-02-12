<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Service;

use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Service\Service;

class CreateKoImplServiceRepository implements ServiceRepositoryContract
{

    public function find(string $id): ?Service
    {
        return null;
    }

    public function findByName(string $name): ?Service
    {
        return null;
    }

    public function create(array $params = []): array
    {
        throw new \Exception('an exception');
    }

    public function update(string $identity, array $params): array
    {
        return [];
    }

    public function delete(string $identity): bool
    {
        return true;
    }

    public function enablePlugin(string $identity, string $pluginName): bool
    {
        return true;
    }
}