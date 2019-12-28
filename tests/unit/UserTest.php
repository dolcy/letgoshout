<?php

declare(strict_types=1);

use App\Domain\Users\Entities\User;
use Faker\Factory;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testCanCreateAndSeeNewUser()
    {
        $faker = Factory::create();
        // given entity attributes
        $name = $faker->name;
        $userName = $faker->userName;
        $email = $faker->safeEmail;
        $password = bcrypt('secret');
        $remember = str_random(10);

        // create new user
        User::create([
          'name' => $name,
          'username' => $userName,
          'email' => $email,
          'password' => $password,
          'remember_token' => $remember
        ]);

        $this->tester->seeRecord('users', [
          'email' => $email,
          'password' => $password,
          'username' => $userName
        ]);
    }
}
