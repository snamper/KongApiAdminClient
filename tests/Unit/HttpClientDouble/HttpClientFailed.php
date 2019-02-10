<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientFailed implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        throw new \Exception("something failed");
    }

    public function get(string $url, array $params = [])
    {
    }

    public function delete(string $url, array $params = [])
    {
    }
}