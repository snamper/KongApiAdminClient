<?php namespace Gco\KongApiClient\Tests\Unit\Service;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Gco\KongApiClient\Service\Configuration;
use Gco\KongApiClient\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\HttpClientDouble\HttpClientGetRoutesOfService;
use Ramsey\Uuid\Uuid;

class DeleteServiceTest extends TestCase
{
    public function test_ShouldDeleteServicesAndRouteAssociated()
    {
        $this->app->instance(HttpClientContract::class, app(HttpClientGetRoutesOfService::class));

        $serviceConfiguration = (new Configuration())->setUrl('http://example.com');
        $service = new Service($serviceConfiguration, Uuid::uuid4());
        $isServiceDeleted = $service->delete();
        $this->assertTrue($isServiceDeleted);
    }
}