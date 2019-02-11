<?php namespace Gco\KongApiClient\Service;


use Gco\KongApiClient\Exceptions\InvalidServiceConfiguration;
use Gco\KongApiClient\Utils\WhenAble;

class Configuration
{
    use WhenAble;

    private $name;

    private $retries;

    private $protocol;

    private $host;

    private $port;

    private $path;

    private $connectTimeout;

    private $writeTimeout;

    private $readTimeout;

    private $url;


    public function toArray()
    {
        $configuration = [];
        $unprocessedConfiguration = get_object_vars($this);
        array_walk( $unprocessedConfiguration, function ($value, $key) use (&$configuration){
            if($value !== null){
                $configuration[snake_case($key)] = $value;
            }
        });
        return $configuration;
    }

    /**
     * @param mixed $name
     * @return Configuration
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * The number of retries to execute upon failure to proxy. Defaults to 5.
     * @param int $retries
     * @return Configuration
     * @throws InvalidServiceConfiguration
     */
    public function setRetries(int $retries): Configuration
    {
        if($retries < 0){
            throw new InvalidServiceConfiguration('Retries must be a positive integer or 0');
        }
        $this->retries = $retries;
        return $this;
    }

    /**
     * The protocol used to communicate with the upstream. It can be one of http or https. Defaults to "http".
     * @param string $protocol
     * @return Configuration
     * @throws InvalidServiceConfiguration
     */
    public function setProtocol(string $protocol): Configuration
    {
        if(!in_array($protocol, ['http', 'https'])){
            throw new InvalidServiceConfiguration('Protocol must be HTTP or HTTPS');
        }
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * The host of the upstream server.
     * @param mixed $host
     * @return Configuration
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * The upstream server port. Defaults to 80.
     * @param int $port
     * @return Configuration
     */
    public function setPort(int $port): Configuration
    {
        $this->port = $port;
        return $this;
    }

    /**
     * The path to be used in requests to the upstream server.
     * @param mixed $path
     * @return Configuration
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * The timeout in milliseconds for establishing a connection to the upstream server. Defaults to 60000.
     * @param int $connectTimeout
     * @return Configuration
     */
    public function setConnectTimeout(int $connectTimeout): Configuration
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    /**
     * The timeout in milliseconds between two successive write operations for transmitting a request to the upstream server. Defaults to 60000.
     * @param int $writeTimeout
     * @return Configuration
     */
    public function setWriteTimeout(int $writeTimeout): Configuration
    {
        $this->writeTimeout = $writeTimeout;
        return $this;
    }

    /**
     * The timeout in milliseconds between two successive read operations for transmitting a request to the upstream server. Defaults to 60000.
     * @param int $readTimeout
     * @return Configuration
     */
    public function setReadTimeout(int $readTimeout): Configuration
    {
        $this->readTimeout = $readTimeout;
        return $this;
    }

    /**
     * Shorthand attribute to set protocol, host, port and path at once.
     * If Url is provided host, port and path will be overwritten
     * @param String $url
     * @return $this
     */
    public function setUrl(string $url):Configuration
    {
        $this->url = $url;
        return $this;
    }

}