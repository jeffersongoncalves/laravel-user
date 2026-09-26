<?php

namespace JeffersonGoncalves\User\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JeffersonGoncalves\User\User
 */
class User extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-user';
    }
}
