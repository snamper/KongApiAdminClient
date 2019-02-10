<?php namespace Gco\KongApiClient\HttpClient;

Interface HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = []);
}