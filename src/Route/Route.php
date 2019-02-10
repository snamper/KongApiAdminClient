<?php namespace Gco\KongApiClient\Route;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class Route
{
    private $id;

    private $configuration;

    private $httpClient;

    public function __construct(Configuration $configuration, string $id = null)
    {
        $this->id = $id;
        $this->configuration = $configuration;
        $this->httpClient = app(HttpClientContract::class);
    }

    public function createAndAssociateToService($serviceId)
    {
        $routeCreatedData = $this->httpClient->post(
            config('kong.url').'/services/'.$serviceId.'/routes',
            $this->configuration->toArray()
        );
        return $routeCreatedData;
    }

}