<?php

declare(strict_types=1);

use App\Domain\Tweets\Entities\Tweet;
use App\Presenters\Tweets\TweetPresenter;

class TweetTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testCanSeeRandomUserTweet()
    {
        $tweet = Tweet::with('user')->inRandomOrder()->first();
        $this->tester->seeRecord('tweets', [
        'id' => $tweet->id,
        'user_id' => $tweet->user->id,
        'tweet' => $tweet->tweet
      ]);
    }

    public function testTweetIsUppercase()
    {
        $normal = Tweet::find(1);
        $uppercase = new TweetPresenter(Tweet::find(1));
        $this->assertNotEquals($normal->tweet, $uppercase->tweetToUppercase());
    }

    public function testTweetEndsWithExclamation()
    {
        $uppercase = new TweetPresenter(Tweet::find(1));
        $this->assertStringEndsWith('!', $uppercase->tweetToUppercase());
    }
}
