<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param AuthInterface $authService
     */
    public function __construct(protected AuthInterface $authService)
    {

    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request): mixed
    {
        return $this->authService->login($request->all());
    }
}
