<?php

declare(strict_types=1);

use Illuminate\Database\Seeder;
use App\Domain\Tweets\Entities\Tweet;
use App\Domain\Users\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // generate fake users
        factory(User::class, 20)->create();

        // generate tweet seeder
        $this->call(TweetSeeder::class);
    }
}
