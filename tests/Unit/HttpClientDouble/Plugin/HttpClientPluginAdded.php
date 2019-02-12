<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble\Plugin;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientPluginAdded implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        return [
            "id" => "a3ad71a8-6685-4b03-a101-980a953544f6",
            "name" => "rate-limiting",
            "created_at" =>  1422386534,
            "route" =>  null,
            "service" => null,
            "consumer" => null,
            "config" => null,
            "run_on" => "first",
            "enabled" =>  true,
            'consumer' => ['id' => 1]
        ];
    }

    public function get(string $url, array $params = [])
    {
    }

    public function delete(string $url, array $params = [])
    {
    }
}