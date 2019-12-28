<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Infrastructure\Users\Interfaces\UserRepositoryInterface;
use App\Http\Controllers\Controller as BaseController;

class UserController extends BaseController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();

        return response()->json($users);
    }

    public function show($id)
    {
        return $this->userRepository->findUserById($id);
    }

    public function getTweets(Request $request, $username)
    {
        $user = $this->userRepository->getUserTweets($request, $username);

        return response()->json($user);
    }
}
