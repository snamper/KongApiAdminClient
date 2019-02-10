<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientEmptyImpl implements HttpClientContract
{

    public function post(string $url, array $params = [], array $headers = [])
    {
        return [];
    }

    public function get(string $url, array $params = [])
    {
        return [];
    }

    public function delete(string $url, array $params = [])
    {
        return true;
    }
}