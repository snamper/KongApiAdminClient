<?php namespace Gco\KongApiClient\Service;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Route\Route;

class Service
{
    private $id;

    private $name;

    private $configuration;

    private $httpClient;

    public function __construct(Configuration $configuration, string $id = null)
    {
        $this->id = $id;
        $this->configuration = $configuration;
        $this->httpClient = app(HttpClientContract::class);
    }

    public function create(): bool
    {
        $serviceCreatedData = $this->httpClient->post(
            config('kong.url') . '/services',
            $this->configuration->toArray()
        );

        $this->id = $serviceCreatedData['id'];
        $this->name = $serviceCreatedData['name'];
        return true;
    }

    public function addRoutes(array $routes): array
    {
        $areRoutesCreated = [];
        foreach($routes as $route){
            $areRoutesCreated = $this->addRoute($route, $areRoutesCreated);
        }
        return $areRoutesCreated;
    }

    private function addRoute(Route $route, array $areRoutesCreated): array
    {
        $routeCreatedData = $route->createAndAssociateToService($this->id);
        if(isset($routeCreatedData['id'])) {
            $areRoutesCreated[$routeCreatedData['id']] = true;
            return $areRoutesCreated;
        }
        $areRoutesCreated[$routeCreatedData['id']] = false;
        return $areRoutesCreated;
    }
}