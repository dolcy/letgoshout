<?php

declare(strict_types=1);

namespace App\Infrastructure\Users\Services;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Users\Interfaces\UserRepositoryInterface;
use App\Domain\Users\Repositories\UserRepository;

final class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() : void
    {
        // custom boot here
    }
}
