<?php namespace Gco\KongApiClient\Consumer;

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
        $time = time();
        $payload = [
            'iss' => $this->key,
            "exp" => $time,
            "nbf" => $time,
            "iat" => $time
        ];
        Log::emergency('jwt', [JwtLib::encode($payload, $this->secret), $this->key, $this->secret]);
        return JwtLib::encode($payload, $this->secret, $alg);
    }


}