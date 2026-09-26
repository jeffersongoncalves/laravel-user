<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use JeffersonGoncalves\User\Observers\UserObserver;
use JeffersonGoncalves\User\Tests\Fixtures\User;

it('creates the app subclass through the package factory', function () {
    $user = User::factory()->create();

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->status)->toBeTrue()
        ->and($user->getTable())->toBe('users');
});

it('hashes the password and casts attributes', function () {
    $user = User::factory()->create([
        'password' => 'secret',
        'custom_fields' => ['a' => 1],
    ]);

    expect(Hash::check('secret', $user->password))->toBeTrue()
        ->and($user->custom_fields)->toBe(['a' => 1])
        ->and($user->toArray())->not->toHaveKeys(['password', 'remember_token']);
});

it('supports unverified and inactive states', function () {
    $user = User::factory()->unverified()->inactive()->create();

    expect($user->email_verified_at)->toBeNull()
        ->and($user->status)->toBeFalse();
});

it('clears the users count cache on create and delete via the inherited observer', function () {
    Cache::forever(UserObserver::CACHE_KEY, 99);
    $user = User::factory()->create();
    expect(Cache::has(UserObserver::CACHE_KEY))->toBeFalse();

    Cache::forever(UserObserver::CACHE_KEY, 99);
    $user->delete();
    expect(Cache::has(UserObserver::CACHE_KEY))->toBeFalse();
});
