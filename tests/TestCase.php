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

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('auth.providers.users.model', Fixtures\User::class);
    }

    protected function defineDatabaseMigrations(): void
    {
        (include __DIR__.'/../database/migrations/create_users_table.php.stub')->up();
    }
}
