<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble\Consumer;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientCreated implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        return [
            "id" => "58c8ccbb-eafb-4566-991f-2ed4f678fa70",
            "created_at" => 1422386534,
            "username" => "David Bowie",
            "custom_id" => "1"
        ];
    }

    public function get(string $url, array $params = [])
    {
    }

    public function delete(string $url, array $params = [])
    {
    }
}