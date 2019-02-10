<?php namespace Gco\KongApiClient\HttpClient;

Interface HttpClientContract
{
    public function post(string $url, array $params = [], array $headers = []);
    public function get(string $url, array $params = []);
    public function delete(string $url, array $params = []);
}