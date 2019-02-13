<?php namespace Gco\KongApiClient\Domain\Consumer;

use \Firebase\JWT\JWT as JwtLib;
use Illuminate\Support\Facades\Log;

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

    public function sign(string $alg = 'HS256')
    {
        $payload = [
            'iss' => $this->key
        ];
        return JwtLib::encode($payload, $this->secret, $alg);
    }


}