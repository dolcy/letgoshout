## Letgo tweet shout assessment
Technical assessment based on Twitter. Built entirely in Laravel.

## Getting Started

First, create .env and .env.testing

### Install via composer
```
composer install
```

### Migrate and Seed Data
```
php artisan migrate:fresh --seed
```

### Testing
```
touch storage/testing.sqlite
```

```
php artisan migrate:fresh --seed --env=testing
```

```
composer test
```
