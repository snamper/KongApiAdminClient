<?php namespace Gco\KongApiClient\Repository\Contract;


use Gco\KongApiClient\Consumer\Consumer;
use Gco\KongApiClient\Consumer\Jwt;

interface ConsumerRepositoryContract
{
    public function find(string $id):? Consumer;

    public function create(array $params = []): array;

    public function update(string $identity, array $params): array;

    public function delete(string $identity): bool;

    public function createJwtToken(string $id):Jwt;
}