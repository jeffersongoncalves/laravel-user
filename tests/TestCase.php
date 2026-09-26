<?php

namespace JeffersonGoncalves\User\Tests;

use JeffersonGoncalves\User\UserServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            UserServiceProvider::class,
        ];
    }
}
