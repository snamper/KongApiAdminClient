<?php namespace Gco\KongApiClient\Repository\Contract;

use Gco\KongApiClient\Domain\Service\Service;

interface ServiceRepositoryContract
{
    public function find(string $id):? Service;

    public function findByName(string $name):? Service;

    public function create(array $params = []): array;

    public function update(string $identity, array $params): array;

    public function delete(string $identity): bool;

    public function enablePlugin(string $identity, string $pluginName): bool;
}