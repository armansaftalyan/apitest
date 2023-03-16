<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\Auth\AuthInterface;

class RegisterController extends Controller
{
    /**
     * @param AuthInterface $authService
     */
    public function __construct(protected AuthInterface $authService)
    {
    }

    /**
     * @param RegisterRequest $request
     * @return User
     */
    public function register(RegisterRequest $request): User
    {
        return $this->authService->create($request->all());
    }
}
