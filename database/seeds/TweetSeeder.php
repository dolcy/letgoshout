<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use App\Domain\Tweets\Entities\Tweet;
use App\Domain\Users\Entities\User;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->delete();
        $json = File::get("database/data/tweets.json");
        $data = json_decode($json);
        foreach ($data as $tweet) {
            Tweet::create(array(
              'user_id' => $this->getRandomUserId(),
              'tweet' => $tweet,
            ));
        }
    }

    private function getRandomUserId()
    {
        $user = User::inRandomOrder()->first();
        return $user->id;
    }
}
