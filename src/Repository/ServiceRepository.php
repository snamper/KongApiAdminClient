<?php namespace Gco\KongApiClient\Repository;

use Gco\KongApiClient\Factory\ServiceFactory;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Service\Service;

class ServiceRepository implements ServiceRepositoryContract
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function find(string $id):? Service
    {
        $serviceData = $this->httpClient->get(
            config('kong.url') . '/services/'.$id
        );
        if(!empty($serviceData)){
            return app(ServiceFactory::class)->build($serviceData);
        }
        return null;
    }

    public function findByName(string $name):? Service
    {
        $serviceData = $this->httpClient->get(
            config('kong.url') . '/services/'.$name
        );
        if(!empty($serviceData)){
            return app(ServiceFactory::class)->build($serviceData);
        }
        return null;
    }

    public function list():array
    {
        $services = [];
        $url = config('kong.url') . '/services/';
        do {
            $servicesData = $this->httpClient->get($url);
            foreach ($servicesData['data'] as $service) {
                $services[] = app(ServiceFactory::class)->build($service);
            }
            if($servicesData['next'] !== null){
                $url = $servicesData['next'];
            }
        }while($servicesData['next'] !== null);
        return $services;
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
        return $this->httpClient->put(
            config('kong.url') . '/services',
            $params
        );
    }

    public function delete(string $identity): bool
    {
        $this->httpClient->delete(config('kong.url').'/services/'.$identity);
        return true;
    }

    public function enablePlugin(string $identity, string $pluginName): bool
    {
        $this->httpClient->post(config('kong.url').'/services/'.$identity.'/plugins', ['name' => $pluginName]);
        return true;
    }
}