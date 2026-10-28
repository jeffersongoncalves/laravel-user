<?php

namespace JeffersonGoncalves\User\Tests;

use JeffersonGoncalves\PestPluginDatabaseMigrations\LoadsPackageMigrations;
use JeffersonGoncalves\User\UserServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use LoadsPackageMigrations;

    protected function getPackageProviders($app): array
    {
        return [
            UserServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('auth.providers.users.model', Fixtures\User::class);
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadPackageMigrations(UserServiceProvider::class);
    }
}
