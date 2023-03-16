<?php

namespace App\Services\Users;


use App\Http\Resources\UserResource;

interface UsersInterface
{
    /**
     * @return UserResource
     */
    public function getUsers(): UserResource;


    public function createUsers();
}
