<?php namespace Gco\KongApiClient\Repository;

use Gco\KongApiClient\Consumer\Consumer;
use Gco\KongApiClient\Consumer\Jwt;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;

class ConsumerRepository implements ConsumerRepositoryContract
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function find(string $id): ?Consumer
    {
        // TODO: Implement find() method.
    }

    public function create(array $params = []): array
    {
        return $this->httpClient->post(config('kong.url').'/consumers', $params);
    }

    public function update(string $identity, array $params): array
    {
        // TODO: Implement update() method.
    }

    public function delete(string $identity): bool
    {
        // TODO: Implement delete() method.
    }

    public function createJwtToken(string $id): Jwt
    {
        $jwtData = $this->httpClient->post(config('kong.url').'/consumers/'.$id.'/jwt');
        $consumerId = $jwtData['consumer']['id'];
        return new Jwt($jwtData['id'], $consumerId, $jwtData['key'], $jwtData['secret']);
    }
}