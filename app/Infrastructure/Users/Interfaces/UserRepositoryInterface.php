<?php

declare(strict_types=1);

namespace App\Infrastructure\Users\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    /**
     * Get all users
     *
     * @return mixed
     */
    public function getAllUsers();

    /**
     * Retrieve user by id
     *
     * @param int $id
     * @return mixed
     */
    public function findUserById(int $id);

    /**
     * Retrieves all tweets by user
     *
     * @param string $username
     * @param Request $request
     *
     * @return mixed
     */
    public function getUserTweets(Request $request, string $username);
}
