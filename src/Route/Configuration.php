<?php namespace Gco\KongApiClient\Route;

class Configuration
{
    private $name;

    private $protocols = [];

    private $methods = [];

    private $hosts = [];

    private $paths = [];

    private $regexPriority;

    private $stripePath;

    private $preserveHost;

    private $snis = [];

    private $sources = [];

    private $destinations = [];


    public function toArray()
    {
        $configuration = [];
        $unprocessedConfiguration = get_object_vars($this);
        array_walk( $unprocessedConfiguration, function ($value, $key) use (&$configuration){
            if($value !== null && !empty($value)){
                $k = snake_case($key);
                /*if(snake_case($key) === 'hosts'){
                    $k = snake_case($key).'[]';
                    $value1 = implode('hosts[]' , $value);
                    dd($value1);
                }*/
                $configuration[$k] = $value;
            }
        });
        return $configuration;
    }

    /**
     * @param string $name
     * @return Configuration
     */
    public function setName(string $name): Configuration
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $protocols
     * @return Configuration
     */
    public function setProtocols(array $protocols): Configuration
    {
        $this->protocols = $protocols;
        return $this;
    }

    /**
     * @param array $methods
     * @return Configuration
     */
    public function setMethods(array $methods): Configuration
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @param array $hosts
     * @return Configuration
     */
    public function setHosts(array $hosts): Configuration
    {
        $this->hosts = $hosts;
        return $this;
    }

    /**
     * @param array $paths
     * @return Configuration
     */
    public function setPaths(array $paths): Configuration
    {
        $this->paths = $paths;
        return $this;
    }

    /**
     * @param int $regexPriority
     * @return Configuration
     */
    public function setRegexPriority(int $regexPriority): Configuration
    {
        $this->regexPriority = $regexPriority;
        return $this;
    }

    /**
     * @param bool $stripePath
     * @return Configuration
     */
    public function setStripePath(bool $stripePath): Configuration
    {
        $this->stripePath = $stripePath;
        return $this;
    }

    /**
     * @param bool $preserveHost
     * @return Configuration
     */
    public function setPreserveHost(bool $preserveHost): Configuration
    {
        $this->preserveHost = $preserveHost;
        return $this;
    }

    /**
     * @param array $snis
     * @return Configuration
     */
    public function setSnis(array $snis): Configuration
    {
        $this->snis = $snis;
        return $this;
    }

    /**
     * @param array $sources
     * @return Configuration
     */
    public function setSources(array $sources): Configuration
    {
        $this->sources = $sources;
        return $this;
    }

    /**
     * @param array $destinations
     * @return Configuration
     */
    public function setDestinations(array $destinations): Configuration
    {
        $this->destinations = $destinations;
        return $this;
    }
}