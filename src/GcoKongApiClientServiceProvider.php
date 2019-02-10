<?php namespace Gco\KongApiClient;

use Gco\KongApiClient\HttpClient\HttpClient;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Illuminate\Support\ServiceProvider;

class GcoKongApiClientServiceProvider extends ServiceProvider
{

    public $bindings = [
        HttpClientContract::class => HttpClient::class
    ];

    public function boot()
    {
    }

    public function register()
    {

    }
}