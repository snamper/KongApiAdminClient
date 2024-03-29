<?php namespace Gco\KongApiClient\Domain\Service;

use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Route\Route;

class Service
{
    private $id;

    private $name;

    private $configuration;

    private $routes = [];

    private $plugins = [];

    private $serviceRepository;

    private $routeRepository;

    public function __construct(Configuration $configuration, string $id = null, string $name = null)
    {
        $this->id = $id;
        $this->configuration = $configuration;
        $this->name = $name;
        $this->serviceRepository = app(ServiceRepositoryContract::class);
        $this->routeRepository = app(RouteRepositoryContract::class);
    }

    public function create(): bool
    {
        $serviceCreatedData = $this->serviceRepository->create($this->configuration->toArray());
        $this->id = $serviceCreatedData['id'];
        $this->name = $serviceCreatedData['name'];
        return true;
    }

    public function update(Configuration $configuration): Bool
    {
        $serviceUpdatedData = $this->serviceRepository->update($this->identity(), $this->configuration->toArray());
        $this->configuration = $configuration;
        $this->name = $serviceUpdatedData['name'];
        return true;
    }

    public function addRoutes(array $routes): bool
    {
        foreach($routes as $route){
            $this->addRoute($route);
        }
        return true;
    }

    private function addRoute(Route $route): bool
    {
        $route->createAndAssociateToService($this->identity());
        $this->routes[] = $route;
        return true;
    }

    public function enablePlugin(string $name):bool
    {
        $this->plugins[$name] = $name;
        $this->serviceRepository->enablePlugin($this->identity(), $name);
        return true;
    }

    public function delete():bool
    {
        $this->deleteAssociatedRoutes();
        $this->serviceRepository->delete($this->identity());
        return true;
    }

    private function identity():string
    {
        return isset($this->id) ? $this->id : $this->name;
    }

    public function routes(bool $fresh = false):array
    {
        if($fresh === true){
            return $this->routes = $this->routeRepository->findRoutesByService($this->identity());
        }
        return $this->routes;
    }

    private function deleteAssociatedRoutes(): void
    {
        foreach ($this->routes(true) as $route) {
            $route->delete();
        }
    }

    public function getConfiguration():Configuration
    {
        return $this->configuration;
    }
}