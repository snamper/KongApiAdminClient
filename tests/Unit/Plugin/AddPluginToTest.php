<?php namespace Gco\KongApiClient\Tests\Unit\Plugin;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Service\Configuration;
use Gco\KongApiClient\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Plugin\HttpClientPluginAdded;

class AddPluginToTest extends TestCase
{
    public function test_ShouldAddPluginToService()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientPluginAdded::class));

        $configuration = new Configuration();
        $configuration->setUrl('http://google.fr');
        $service = new Service($configuration, 1);
        $isPluginAdded = $service->enablePlugin('jwt');
        $this->assertTrue($isPluginAdded);
    }
}