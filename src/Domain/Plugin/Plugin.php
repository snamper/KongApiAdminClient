<?php namespace Gco\KongApiClient\Domain\Plugin;

use Gco\KongApiClient\Repository\Contract\PluginRepositoryContract;

class Plugin
{
    private $id;

    private $name;

    private $configuration;

    private $pluginRepository;

    public function __construct(string $name, Configuration $configuration, string $id = null)
    {
        $this->configuration = $configuration;
        $this->name = $name;
        $this->id = $id;
        $this->pluginRepository = app(PluginRepositoryContract::class);
    }

    public function activate()
    {
        $pluginData = $this->pluginRepository->activate($this->name, []);
        $this->id = $pluginData['id'];
        return true;
    }
}