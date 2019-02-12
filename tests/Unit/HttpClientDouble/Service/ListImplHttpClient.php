<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble\Service;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class ListImplHttpClient implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        return [];
    }

    public function get(string $url, array $params = [])
    {
        return [
            'next' => null,
            'data' => [[
                "host" => "mockbin.org",
                "created_at" => 1519130509,
                "connect_timeout" => 60000,
                "id" => "92956672-f5ea-4e9a-b096-667bf55bc40c",
                "protocol" => "http",
                "name" => "example-service",
                "read_timeout" => 60000,
                "port" => 80,
                "path" => null,
                "updated_at" => 1519130509,
                "retries" => 5,
                "write_timeout" => 60000
            ],
            [
                "host" => "mockbin2.org",
                "created_at" => 1519130509,
                "connect_timeout" => 60000,
                "id" => "92956672-f5ea-4e9a-b096-667bf55bc40c",
                "protocol" => "http",
                "name" => "example2-service",
                "read_timeout" => 60000,
                "port" => 80,
                "path" => null,
                "updated_at" => 1519130509,
                "retries" => 5,
                "write_timeout" => 60000
            ]],
        ];
    }

    public function delete(string $url, array $params = [])
    {
    }
}