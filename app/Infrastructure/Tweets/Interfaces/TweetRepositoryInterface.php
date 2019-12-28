<?php

declare(strict_types=1);

namespace App\Infrastructure\Tweets\Interfaces;

interface TweetRepositoryInterface
{
    /**
     * Get all tweets
     *
     * @return array
     */
    public function getAllTweets();

    /**
     * Retrieve tweet by id
     * @param  int $id
     * @return  mixed
     */
    public function findTweetById(int $id);
}
