<?php namespace Gco\KongApiClient\Tests\Unit\HttpClientDouble\Consumer;

use Gco\KongApiClient\HttpClient\HttpClientContract;

class HttpClientJwtCreated implements HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = [])
    {
        return [
            "consumer" => ['id', "7bce93e1-0a90-489c-c887-d385545f8f4b"],
            "created_at" =>  1442426001000,
            "id" =>  "bcbfb45d-e391-42bf-c2ed-94e32946753a",
            "key" => "a36c3049b36249a3c9f8891cb127243c",
            "secret" => "e71829c351aa4242c2719cbfbe671c09"
        ];
    }

    public function get(string $url, array $params = [])
    {
    }

    public function delete(string $url, array $params = [])
    {
    }
}