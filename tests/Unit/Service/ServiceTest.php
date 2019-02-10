<?php namespace Gco\KongApiClient\Tests\Unit;

use Gco\KongApiClient\Exceptions\InvalidServiceConfiguration;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Service\Configuration;
use Gco\KongApiClient\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\HttpClientFailed;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\HttpClientOk;

class ServiceTest extends TestCase
{
    public function test_ShouldCreateAService_WhenSpecifyingUrlAndServiceName()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientOk::class));

        $configuration = new Configuration();
        $configuration->setName('service_name')
            ->setUrl('http://google.fr');

        $service = new Service($configuration);
        $isServiceCreated = $service->create();
        $this->assertTrue($isServiceCreated);
    }

    public function test_ShouldNotCreateService_WhenRetriesNegative()
    {
        $this->expectException(InvalidServiceConfiguration::class);
        $configuration = new Configuration();
        $configuration->setRetries(-5);
    }

    public function test_ShouldNotCreateService_WhenProtocolNotInHttpOrHttps()
    {
        $this->expectException(InvalidServiceConfiguration::class);
        $configuration = new Configuration();
        $configuration->setProtocol('htt');
    }

    public function test_ShouldNotCreateAService()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientFailed::class));

        $configuration = new Configuration();
        $configuration->setName('service name')
            ->setUrl('http://google.fr');

        $service = new Service($configuration);
        $this->expectException(\Exception::class);
        $service->create();
    }
}