<?php

declare(strict_types=1);

namespace App\Infrastructure\Tweets\Services;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Tweets\Interfaces\TweetRepositoryInterface;
use App\Domain\Tweets\Repositories\TweetRepository;

final class TweetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->app->bind(
            TweetRepositoryInterface::class,
            TweetRepository::class
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
