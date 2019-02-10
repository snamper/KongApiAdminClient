<?php namespace Gco\KongApiClient\Consumer;

use Gco\KongApiClient\Exceptions\InvalidConsumerInput;
use Gco\KongApiClient\HttpClient\HttpClientContract;

class Consumer
{
    private $name;

    private $customId;

    private $httpClient;

    private $id;

    private $jwt;

    public function __construct(string $name = null, string $customId = null, string $id = null)
    {
        $this->checkInputs($name, $customId);
        $this->name = $name;
        $this->customId = $customId;
        $this->httpClient = app(HttpClientContract::class);
        $this->id = $id;
    }

    public function create()
    {
        $params = $this->prepareParams();
        $consumerData = $this->httpClient->post(config('kong.url').'/consumers', $params);
        $this->id = $consumerData['id'];
        return true;
    }

    public function createJwtToken():Jwt
    {
        $jwtData = $this->httpClient->post(config('kong.url').'/consumers/'.$this->id.'/jwt');
        $this->jwt[] = $jwt = new Jwt($jwtData['id'], $jwtData['consumer_id'], $jwtData['key'], $jwtData['secret']);
        return $jwt;
    }

    /**
     * @param string $name
     * @param $customId
     * @throws InvalidConsumerInput
     */
    private function checkInputs(string $name = null, $customId = null): void
    {
        if ($name === null && $customId === null) {
            throw new InvalidConsumerInput('Name or custom_id must be provided to create a consumer');
        }
    }

    /**
     * @return array
     */
    private function prepareParams(): array
    {
        $params = [];
        if ($this->name !== '' && $this->name !== null) {
            $params['username'] = $this->name;
        }
        if ($this->customId !== '' && $this->customId !== null) {
            $params['custom_id'] = $this->customId;
        }
        return $params;
    }
}