<?php

namespace App\Services\Users;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Auth\AuthInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersService implements UsersInterface
{
    public function __construct(protected AuthInterface $authService)
    {

    }

    /**
     * @return UserResource
     */
    public function getUsers(): UserResource
    {
        return new UserResource(User::all());
    }

    /**
     * @return array|mixed
     */
    public function createUsers(): mixed
    {
        $response = Http::accept('application/json')->get('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($response, true);

        foreach ($users as $user) {
            $this->authService->create($user);
        }
        $this->authService->create([
            'name' => 'api',
            'email' => 'test@test.ru',
            'password' => '123123'
        ]);
        return $response->json(['data' => 'success']);
    }
}
