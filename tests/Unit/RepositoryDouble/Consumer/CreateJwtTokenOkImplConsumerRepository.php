<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Consumer;

use Gco\KongApiClient\Consumer\Consumer;
use Gco\KongApiClient\Consumer\Jwt;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;

class CreateJwtTokenOkImplConsumerRepository implements ConsumerRepositoryContract
{

    public function find(string $id): ?Consumer
    {
        return null;
    }

    public function create(array $params = []): array
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

    public function createJwtToken(string $id): array
    {
        return [
            "consumer" => ['id' => "7bce93e1-0a90-489c-c887-d385545f8f4b"],
            "created_at" =>  1442426001000,
            "id" =>  "bcbfb45d-e391-42bf-c2ed-94e32946753a",
            "key" => "a36c3049b36249a3c9f8891cb127243c",
            "secret" => "e71829c351aa4242c2719cbfbe671c09"
        ];
    }
}