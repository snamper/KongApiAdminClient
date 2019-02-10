<?php namespace Gco\KongApiClient\Tests;

use Gco\KongApiClient\GcoKongApiClientServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [GcoKongApiClientServiceProvider::class];
    }
}