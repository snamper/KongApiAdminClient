<?php namespace Gco\KongApiClient\Tests\Unit\RepositoryDouble\Plugin;

use Gco\KongApiClient\Repository\Contract\PluginRepositoryContract;

class ActivatePluginRepositoryDouble implements PluginRepositoryContract
{
    public function activate(string $name, array $params = []): array
    {
        return [
            "id" => "a3ad71a8-6685-4b03-a101-980a953544f6",
            "name" => "rate-limiting",
            "created_at" => 1422386534,
            "route" => null,
            "service" => null,
            "consumer" => null,
            "config" => '{"hour":500, "minute":20}',
            "run_on" => "first",
            "enabled" => true
        ];
    }
}