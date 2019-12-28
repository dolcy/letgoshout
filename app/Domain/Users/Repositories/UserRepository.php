<?php

declare(strict_types=1);

namespace App\Domain\Users\Repositories;

use Illuminate\Http\Request;
use App\Domain\Tweets\Entities\Tweet;
use App\Domain\Users\Entities\User;
use App\Presenters\Tweets\TweetPresenter;
use App\Infrastructure\Users\Interfaces\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    /**
     * Get all users
     * @return mixed
     */
    public function getAllUsers()
    {
        return User::all();
    }

    /**
     * Retrieve user by id
     * @param  int $id
     * @return mixed
     */
    public function findUserById($id)
    {
        // find user by id
        $user = User::find($id);

        // return error if user does not exist
        if (! $user) {
            return response()->json('Sorry, user was not found.', 404);
        }

        return $user;
    }

    /**
     * Retrieves all tweets by user
     * @param string $username
     * @param Request $request
     * @return mixed $tweets
     */
    public function getUserTweets(Request $request, $username)
    {
        // set query request for limit
        $limit = $request->query('limit');

        // find user by username
        $user = User::where('username', $username)->first();

        if ($user) {
            // iterate over user tweets
            $tweets = Tweet::where('user_id', $user->id)->take(intval($limit))->get()
               ->present(TweetPresenter::class)
               ->map(function ($tweet) {
                   return [
                     'tweet' => $tweet->tweetToUppercase(),
                 ];
               });
        } else {
            return response()->json('Sorry, this username is invalid!');
        }

        // query limit =< 10
        if ($tweets->count() > 10) {
            return response()->json('Sorry, this query reached its limit!');
        }

        return $tweets;
    }
}
