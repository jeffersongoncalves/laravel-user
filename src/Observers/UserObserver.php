<?php

namespace JeffersonGoncalves\User\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    public const CACHE_KEY = 'users_count';

    public function created(Model $user): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public function deleted(Model $user): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
