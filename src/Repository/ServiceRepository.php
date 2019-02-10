<?php namespace Gco\KongApiClient\Repository;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Service\Configuration;
use Gco\KongApiClient\Service\Service;

class ServiceRepository implements ServiceRepositoryContract
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function find(string $identity):? Service
    {
        $serviceData = $this->httpClient->get(
            config('kong.url') . '/services'
        );
        if(!empty($serviceData)){
            $configuration = (new Configuration());
            return null;
        }
        return null;
    }

    public function create(array $params = []): array
    {
        return $this->httpClient->post(
            config('kong.url') . '/services',
            $params
        );
    }

    public function update(string $identity, array $params): array
    {
        // TODO: Implement update() method.
    }

    public function delete(string $identity): bool
    {
        $this->httpClient->delete(config('kong.url').'/services/'.$identity);
        return true;
    }

    public function enablePlugin(string $identity, string $pluginName): bool
    {
        $this->httpClient->post(config('kong.url').'/services/'.$identity.'/plugin', ['name' => $pluginName]);
        return true;
    }
}