<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Service;

use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Service\Service;

class UpdateOkImplServiceRepository implements ServiceRepositoryContract
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
        return [];
    }

    public function update(string $identity, array $params): array
    {
        return [
            "host" => "mockbin.org",
            "created_at" => 1519130509,
            "connect_timeout" => 60000,
            "id" => "92956672-f5ea-4e9a-b096-667bf55bc40c",
            "protocol" => "http",
            "name" => "example-service",
            "read_timeout" => 60000,
            "port" => 80,
            "path" => null,
            "updated_at" => 1519130509,
            "retries" => 5,
            "write_timeout" => 60000
        ];
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