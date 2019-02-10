<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble;

use Gco\KongApiClient\HttpClient\HttpClientContract;
use Ramsey\Uuid\Uuid;

class HttpClientRouteCreated implements HttpClientContract
{

    public function post(string $url, array $params = [], array $headers = [])
    {
        return [
            "id" => Uuid::uuid4()->toString()
        ];
    }
}