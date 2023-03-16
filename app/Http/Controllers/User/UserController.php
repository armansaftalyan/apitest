<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\Users\UsersInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * @param UsersInterface $usersService
     */
    public function __construct(protected UsersInterface $usersService)
    {

    }

    /**
     * @return UserResource
     */
    public function getUsers(): UserResource
    {
        return $this->usersService->getUsers();
    }

    /**
     * @return array|mixed
     */
    public function createUsers(): mixed
    {
        return $this->usersService->createUsers();
    }
}
