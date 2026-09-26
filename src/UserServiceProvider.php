<?php

namespace JeffersonGoncalves\User;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-user')
            ->hasMigration('create_users_table');
    }
}
