<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tweets;

use Illuminate\Http\Request;
use App\Infrastructure\Tweets\Interfaces\TweetRepositoryInterface;
use App\Http\Controllers\Controller as BaseController;

class TweetController extends BaseController
{
    /**
     * @var TweetRepositoryInterface $tweetRepository
     */
    private $tweetRepository;

    /**
     * @param TweetRepositoryInterface $tweetRepository
     */
    public function __construct(TweetRepositoryInterface $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    /**
     * Display tweet index resource.
     */
    public function index()
    {
        $tweets = $this->tweetRepository->getAllTweets();

        return response()->json($tweets);
    }

    /**
     * Display tweet by id resource.
     */
    public function show($id)
    {
        $tweet = $this->tweetRepository->findTweetById($id);

        return response()->json($tweet);
    }
}
