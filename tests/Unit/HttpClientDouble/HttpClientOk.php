<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientOk implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        return [
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
        ];
    }
}