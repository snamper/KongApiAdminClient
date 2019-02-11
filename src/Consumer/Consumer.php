<?php namespace Gco\KongApiClient\Consumer;

use Gco\KongApiClient\Exceptions\InvalidConsumerInput;
use Gco\KongApiClient\Repository\Contract\ConsumerRepositoryContract;

class Consumer
{
    private $name;

    private $customId;

    private $id;

    private $jwt;

    private $consumerRepository;

    public function __construct(string $name = null, string $customId = null, string $id = null)
    {
        $this->checkInputs($name, $customId);
        $this->name = $name;
        $this->customId = $customId;
        $this->id = $id;
        $this->consumerRepository = app(ConsumerRepositoryContract::class);
    }

    public function create()
    {
        $params = $this->prepareParams();
        $consumerData = $this->consumerRepository->create($params);
        $this->id = $consumerData['id'];
        return true;
    }

    public function createJwtToken():Jwt
    {
        $this->jwt[] = $jwt = $this->consumerRepository->createJwtToken($this->id);
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