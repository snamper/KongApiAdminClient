<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Consumer;

use Gco\KongApiClient\Consumer\Consumer;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;

class CreateOkImplConsumerRepository implements ConsumerRepositoryContract
{

    public function find(string $id): ?Consumer
    {
        return null;
    }

    public function create(array $params = []): array
    {
        return [
            "id" => "58c8ccbb-eafb-4566-991f-2ed4f678fa70",
            "created_at" => 1422386534,
            "username" => "David Bowie",
            "custom_id" => "1"
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

    public function createJwtToken(string $id): array
    {
        return [];
    }
}