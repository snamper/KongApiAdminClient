<?php namespace Gco\KongApiClient\Factory;

use Gco\KongApiClient\Domain\Service\Configuration;
use Gco\KongApiClient\Domain\Service\Service;

class ServiceFactory
{
    public function build(array $params): Service
    {
        $configuration = new Configuration();
        $configuration
            ->when(isset($params['name']), function () use($configuration, $params){
                $configuration->setName($params['name']);
            })
            ->when(isset($params['retries']), function () use ($configuration, $params){
                $configuration->setRetries($params['retries']);
            })
            ->when(isset($params['protocol']) , function () use($configuration, $params) {
                $configuration->setProtocol($params['protocol']);
            })
            ->when(isset($params['connect_timeout']) , function () use($configuration, $params) {
                $configuration->setConnectTimeout($params['connect_timeout']);
            })
            ->when(isset($params['write_timeout']) , function () use($configuration, $params) {
                $configuration->setWriteTimeout($params['write_timeout']);
            })
            ->when(isset($params['hosts']) , function () use($configuration, $params) {
                $configuration->setHost($params['hosts']);
            })
            ->when(isset($params['port']) , function () use($configuration, $params) {
                $configuration->setPort($params['port']);
            })
            ->when(isset($params['path']) , function () use($configuration, $params) {
                $configuration->setPath($params['path']);
            })
            ->when(isset($params['read_timeout']) , function () use($configuration, $params) {
                $configuration->setReadTimeout($params['read_timeout']);
            });
        return new Service($configuration, $params['id'], $params['name']);
    }
}