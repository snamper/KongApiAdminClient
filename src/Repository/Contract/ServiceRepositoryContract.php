<?php namespace Gco\KongApiClient\Repository\Contract;

use Gco\KongApiClient\Service\Service;

interface ServiceRepositoryContract
{
    public function find(string $identity):? Service;

    public function create(array $params = []): array;

    public function update(string $identity, array $params): array;

    public function delete(string $identity): bool;

    public function enablePlugin(string $identity, string $pluginName): bool;
}