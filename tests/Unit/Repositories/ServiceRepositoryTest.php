<?php namespace Gco\KongApiClient\Tests\Unit\Repositories;

use Gco\KongApiClient\Domain\Service\Service;
use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Repository\ServiceRepository;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Service\FindImplHttpClient;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Service\ListImplHttpClient;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\Service\ListWithPaginationImplHttpClient;

class ServiceRepositoryTest extends TestCase
{
    public function test_ShouldReturnAService()
    {
        $serviceId = 1;
        $this->app->instance(HttpClientContract::class, app(FindImplHttpClient::class));

        $service = app(ServiceRepository::class)->find($serviceId);
        $this->assertInstanceOf(Service::class, $service);
    }

    public function test_ShouldReturnAListOfServices()
    {
        $serviceId = 1;
        $this->app->instance(HttpClientContract::class, app(ListImplHttpClient::class));

        $services = app(ServiceRepository::class)->list($serviceId);
        $this->assertContainsOnlyInstancesOf(Service::class, $services);
        $this->assertCount(2, $services);
    }

    public function test_ShouldReturnAListOfServices_WhenPagination()
    {
        $serviceId = 1;

        $httpClient = $this->createMock(HttpClientContract::class);
        $httpClient->method('get')->willReturnOnConsecutiveCalls(
            app(ListWithPaginationImplHttpClient::class)->get('', []),
            app(ListImplHttpClient::class)->get('', [])
        );
        $this->app->instance(HttpClientContract::class, $httpClient);

        $services = app(ServiceRepository::class)->list($serviceId);
        $this->assertContainsOnlyInstancesOf(Service::class, $services);
        $this->assertCount(4, $services);
    }


}