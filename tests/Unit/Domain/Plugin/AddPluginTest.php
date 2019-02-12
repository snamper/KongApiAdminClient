<?php namespace Gco\KongApiClient\Tests\Unit\Domain\Plugin;

use Gco\KongApiClient\Domain\Plugin\Plugin;
use Gco\KongApiClient\Domain\Plugin\Configuration as PluginConfiguration;
use Gco\KongApiClient\Repository\Contract\PluginRepositoryContract;
use Gco\KongApiClient\Repository\Contract\ServiceRepositoryContract;
use Gco\KongApiClient\Domain\Service\Configuration;
use Gco\KongApiClient\Domain\Service\Service;
use Gco\KongApiClient\Tests\TestCase;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Plugin\ActivatePluginRepositoryDouble;
use Gco\KongApiClient\Tests\Unit\RepositoryDouble\Service\EnablePluginImplServiceRepository;

class AddPluginTest extends TestCase
{
    public function test_ShouldAddPluginToService()
    {
        $this->app->instance(ServiceRepositoryContract::class, app(EnablePluginImplServiceRepository::class));

        $configuration = new Configuration();
        $configuration->setUrl('http://google.fr');
        $service = new Service($configuration, 1);
        $isPluginAdded = $service->enablePlugin('jwt');
        $this->assertTrue($isPluginAdded);
    }

    public function test_ShouldAddGlobalPlugin()
    {
        $this->app->instance( PluginRepositoryContract::class, app(ActivatePluginRepositoryDouble::class));
        $configuration = new PluginConfiguration();
        $plugin = new Plugin('jwt', $configuration);
        $isPluginActivate = $plugin->activate();
        $this->assertTrue($isPluginActivate);
    }
}