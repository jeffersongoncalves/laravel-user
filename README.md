![Laravel User](https://raw.githubusercontent.com/jeffersongoncalves/laravel-user/main/art/jeffersongoncalves-laravel-user.png)

# Laravel User

Base authenticatable `User` model, migration, factory and observer shared by the jeffersongoncalves Laravel starter kits.

Your app keeps its own `App\Models\User` and simply extends the package model, so columns, casts, factory and observer live in one place and every kit gets fixes through `composer update`.

## Installation

```bash
composer require jeffersongoncalves/laravel-user
```

Publish and run the migration (skip it if your app already has a `users` table with the same columns):

```bash
php artisan vendor:publish --tag="laravel-user-migrations"
php artisan migrate
```

## Usage

```php
namespace App\Models;

use JeffersonGoncalves\User\Models\User as BaseUser;

class User extends BaseUser
{
    // add traits, relations or overrides here
}
```

`config/auth.php` keeps pointing the `users` provider to `App\Models\User`.

What the base model gives you:

| Feature | Details |
|---------|---------|
| Columns | `status`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar_url`, `custom_fields`, `locale`, `theme_color` |
| Casts | `password` hashed, `status` boolean, `custom_fields` array, `email_verified_at` datetime |
| Contracts | `Authenticatable`, `Authorizable`, `CanResetPassword`, `MustVerifyEmail`, `Notifiable` |
| Factory | `User::factory()` with `unverified()` and `inactive()` states. It creates the model set in `auth.providers.users.model`, so `App\Models\User::factory()` works without a factory in your app |
| Observer | Clears the `users_count` cache key on create/delete (inherited by subclasses) |

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
