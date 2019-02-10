<?php namespace Gco\KongApiClient\Repository\Contract;

use Gco\KongApiClient\Route\Route;

interface RouteRepositoryContract
{
    public function find(string $identity):? Route;

    public function create(string $serviceId, array $params = []): array;

    public function update(string $identity, array $params): array;

    public function delete(string $identity): bool;

    /**
     * Return an array of Route Instance
     * @param string $serviceId
     * @return array
     */
    public function findRoutesByService(string $serviceId):array;
}