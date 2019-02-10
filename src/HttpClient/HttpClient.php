<?php namespace Gco\KongApiClient\HttpClient;

use Gco\KongApiClient\Exceptions\SchemaViolation;
use Gco\KongApiClient\Exceptions\UniqueViolation;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;

class HttpClient implements HttpClientContract
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function post(string $url, array $params = [], array $headers = []):array
    {
        try {
            $response = $this->client->post($url, ['debug' => config('kong.debug'), RequestOptions::JSON => $params]);
            return json_decode($response->getBody(), true);
        }catch (ClientException $e){
            $this->throwDomainException($e);
            throw $e;
        }
    }

    public function get(string $url, array $params = [])
    {
        $response = $this->client->get($url, $params);
        return json_decode($response->getBody(), true);
    }

    public function delete(string $url, array $params = [])
    {
        $this->client->delete($url, $params);
    }

    /**
     * @param $e
     * @throws SchemaViolation
     * @throws UniqueViolation
     */
    private function throwDomainException(\Exception $e): void
    {
        switch ($e->getCode()) {
            case 409:
                throw new UniqueViolation($e->getMessage(), $e->getCode(), $e);
            case 400:
                throw new SchemaViolation($e->getMessage(), $e->getCode(), $e);
        }
    }

}