<?php namespace Gco\KongApiClient\Factory;

use Gco\KongApiClient\Route\Configuration;
use Gco\KongApiClient\Route\Route;

class RouteFactory
{
    public function build(array $params): Route
    {
        $routeConfiguration = new Configuration();
        $routeConfiguration
            ->setName($params['name'])
            ->setPaths($params['paths'])
            ->setMethods($params['methods'])
            ->setHosts($params['hosts'])
            ->when(isset($params['destinations']), function () use($routeConfiguration, $params){
                $routeConfiguration->setDestinations($params['destinations']);
            })
            ->setPreserveHost($params['preserve_host'])
            ->setProtocols($params['protocols'])
            ->setRegexPriority($params['regex_priority'])
            ->when(isset($params['snis']), function () use($routeConfiguration, $params) {
                $routeConfiguration->setSnis($params['snis']);
             })
            ->when(isset($params['sources']), function () use($routeConfiguration, $params) {
                $routeConfiguration->setSources($params['sources']);
            })
            ->setStripPath($params['strip_path']);

        return new Route($routeConfiguration, $params['id'], $params['name']);
    }
}