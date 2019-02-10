<?php namespace Gco\KongApiClient\Repository;

use Gco\KongApiClient\Factory\RouteFactory;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Route\Route;

class RouteRepository implements RouteRepositoryContract
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function find(string $identity): ?Route
    {
        // TODO: Implement find() method.
    }

    public function create(string $serviceId, array $params = []): array
    {
        return $this->httpClient->post(
            config('kong.url').'/services/'.$serviceId.'/routes',
             $params
        );
    }

    public function update(string $identity, array $params): array
    {
        // TODO: Implement update() method.
    }

    public function delete(string $identity): bool
    {
        $this->httpClient->delete( config('kong.url').'/routes'.$identity);
        return true;
    }

    public function findRoutesByService(string $serviceId): array
    {
        $routes = [];
        $routesData = $this->httpClient->get(config('kong.url').'/services/'.$serviceId.'/routes');
        foreach($routesData as $route){
            $routes[] = app(RouteFactory::class)->build($route);
        }
        return $routes;
    }
}