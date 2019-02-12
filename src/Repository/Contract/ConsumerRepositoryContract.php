<?php namespace Gco\KongApiClient\Repository\Contract;

use Gco\KongApiClient\Consumer\Consumer;

interface ConsumerRepositoryContract
{
    public function find(string $id):? Consumer;

    public function create(array $params = []): array;

    public function update(string $identity, array $params): array;

    public function delete(string $identity): bool;

    public function createJwtToken(string $id): array;
}