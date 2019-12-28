<?php

class TweetApiCest
{
    protected $endpoint = '/shout/tweets';

    // tests
    public function getAllTweets(ApiTester $I)
    {
        $I->am('a user visiting the /shout/tweets endpoint');
        $I->wantTo('retrieve all tweets');
        $I->lookForwardTo('getting all tweets');
        $I->sendGET($this->endpoint);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->see(['tweet'] >= 2);
    }

    public function findTweetById(ApiTester $I)
    {
        $I->am('looking to get a tweet by /shout/tweets/{id} endpoint');
        $I->wantTo('retrieve a tweet by id');
        $I->lookForwardTo('seeing the body of the second tweet');
        $I->sendGET($this->endpoint . '/2');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->see("I KNOW THAT MOST MEN");
    }
}
