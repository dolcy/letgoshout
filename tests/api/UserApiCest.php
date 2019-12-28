<?php

class UserApiCest
{
    protected $prefix = '/shout';

    // tests
    public function getAllUsers(ApiTester $I)
    {
        $I->am('a user visiting the /shout/users endpoint');
        $I->wantTo('retrieve all users');
        $I->lookForwardTo('getting all users with email, username, etc.');
        $I->sendGET($this->prefix . '/users');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(["email_verified_at" => null]);
    }

    public function findUserById(ApiTester $I)
    {
        $I->am('looking to get a user by /shout/users/{id} endpoint');
        $I->wantTo('retrieve a user by id');
        $I->lookForwardTo('seeing the first users id');
        $I->sendGET($this->prefix . '/users/1');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(["id" => 1]);
    }

    public function getUserWithTweetsByLimit(ApiTester $I)
    {
        $I->am('a user retrieving tweets via /shout/username?limit= endpoint');
        $I->wantTo('retrieve tweets by username with limited query');
        $I->lookForwardTo('getting two tweets by user');
        // grab record of first user
        $user = $I->grabRecord('users', array('id' => 1));
        $I->sendGET($this->prefix . '/' . $user['username'] .'?limit=2');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        // check the # of tweets in returned json
        $tweetsFromResponse = $I->grabDataFromResponseByJsonPath('$..tweet');
        $I->assertCount(2, $tweetsFromResponse);
    }

    public function getInvalidUserError(ApiTester $I)
    {
        $I->am('a user retrieving tweets via /shout/username?limit endpoint');
        $I->wantTo('create error by using invalid user');
        $I->lookForwardTo('getting a invalid username message');
        $I->sendGET($this->prefix . '/invalidUser?limit1');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(["original" => "Sorry, this username is invalid!"]);
    }
}
