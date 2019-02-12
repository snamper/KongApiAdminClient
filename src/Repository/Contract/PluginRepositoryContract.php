<?php namespace Gco\KongApiClient\Repository\Contract;

interface PluginRepositoryContract
{
    public function activate(string $name, array $params = []): array;
}