<?php namespace Gco\KongApiClient\Repository;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\Contract\PluginRepositoryContract;

class PluginRepository implements PluginRepositoryContract
{
    private $httpClient;

    public function __construct(HttpClientContract $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function activate(string $name, array $params = []): array
    {

    }
}