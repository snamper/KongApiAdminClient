<?php namespace Gco\KongApiClient\Client;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class ServiceClient
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function list()
    {
        $services = $this->httpClient->get(config('kong.url').'/services', []);
        foreach ($services as $service){
            // create the service Object
        }
        dd($services);
    }
}