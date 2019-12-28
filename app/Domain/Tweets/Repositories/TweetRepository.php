<?php

declare(strict_types=1);

namespace App\Domain\Tweets\Repositories;

use App\Domain\Tweets\Entities\Tweet;
use App\Presenters\Tweets\TweetPresenter;
use App\Infrastructure\Tweets\Interfaces\TweetRepositoryInterface;

final class TweetRepository implements TweetRepositoryInterface
{
    /**
     * Get all tweets
     * @return array
     */
    public function getAllTweets()
    {
        // iterate over tweet presenter
        return Tweet::all()
            ->present(TweetPresenter::class)
            ->map(function ($tweet) {
                return [
                  'tweet' => $tweet->tweetToUppercase(),
              ];
            });
    }

    /**
     * Retrieve tweet by id
     * @param int $id
     * @return mixed
     */
    public function findTweetById($id)
    {
        // get tweet by id
        $tweet = Tweet::find($id);

        if (! $tweet) {
            return response()->json('Sorry, tweet not found.', 404);
        }
        // get tweet presenter
        $tweetItem = new TweetPresenter($tweet);
        return $tweetItem->tweetToUppercase();
    }
}
