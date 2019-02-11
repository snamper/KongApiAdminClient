<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Ramsey\Uuid\Uuid;

class HttpClientGetRoutesOfService implements HttpClientContract
{
    public function get(string $url, array $params = [], array $headers = [])
    {
        return [
            'next' => null,
            'data' => [
            [
                'id' => Uuid::uuid4()->toString(),
                "created_at" => 1422386534,
                "updated_at" => 1422386534,
                "name" => "my-route",
                "protocols" => ["http", "https"],
                "methods" => ["GET", "POST"],
                "hosts" => ["example.com", "foo.test"],
                "paths" => ["/foo", "/bar"],
                "regex_priority" => 0,
                "strip_path" => true,
                "preserve_host" =>  false,
                "service" => '{"id":"f5a9c0ca-bdbb-490f-8928-2ca95836239a"}'
            ]
        ]];
    }

    public function post(string $url, array $params = [], array $headers = [])
    {
    }

    public function delete(string $url, array $params = [])
    {
    }
}