<?php namespace Gco\KongApiClient;

use Gco\KongApiClient\HttpClient\HttpClient;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\ConsumerRepository;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;
use Gco\KongApiClient\Repository\Contract\RouteRepositoryContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Repository\RouteRepository;
use Gco\KongApiClient\Repository\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class GcoKongApiClientServiceProvider extends ServiceProvider
{
    public $bindings = [
        HttpClientContract::class => HttpClient::class,
        ServiceRepositoryContract::class => ServiceRepository::class,
        RouteRepositoryContract::class => RouteRepository::class,
        ConsumerRepositoryContract::class => ConsumerRepository::class,
    ];

    public function boot()
    {
    }

    public function register()
    {
    }
}