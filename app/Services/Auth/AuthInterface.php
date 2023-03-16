<?php

namespace App\Services\Auth;

use App\Models\User;

interface AuthInterface
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    public function login(array $data);
}
