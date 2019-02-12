<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Service;

use Gco\KongApiClient\Domain\Service\Configuration;
use Gco\KongApiClient\Domain\Service\Service;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Service\UpdateOkImplServiceRepository;
use Ramsey\Uuid\Uuid;

class UpdateServiceTest extends TestCase
{
    public function test_ShouldUpdateService()
    {
        $this->app->instance(ServiceRepositoryContract::class, app(UpdateOkImplServiceRepository::class));

        $configuration = (new Configuration())
            ->setName("service-name")
            ->setUrl('http://example.com')
        ;
        $service = new Service($configuration, Uuid::uuid4(), 'service-name');

        $newConfiguration = (new Configuration())
            ->setName("service-name-2")
            ->setUrl('http://example2.com')
        ;

        $isServiceUpdated = $service->update($newConfiguration);
        $this->assertTrue($isServiceUpdated);
        $this->assertEquals($newConfiguration, $service->getConfiguration());
    }
}


