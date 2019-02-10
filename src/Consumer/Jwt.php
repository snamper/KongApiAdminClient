<?php namespace Gco\KongApiClient\Consumer;

class Jwt
{
    private $consumerId;

    private $id;

    private $key;

    private $secret;

    public function __construct(string $id, string $consumerId, string $key, string $secret)
    {
        $this->id = $id;
        $this->consumerId = $consumerId;
        $this->key = $key;
        $this->secret = $secret;
    }
}