<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class AuthService implements AuthInterface
{
    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        if (!array_key_exists('password', $data)) {
            $data['password'] = '123123';
        }

        return User::updateOrCreate(
            ['id' => $data['id'] ?? null],
            Arr::only($data, ['email', 'phone', 'name', 'website', 'password'])
        );
    }

    /**
     * @param array $data
     * @return Model
     */
    public function login(array $data): Model
    {
        $user = User::query()->where('email', '=', $data['email'])->first();

        if (!$user || Hash::check($data['password'], $user->password)) {
            throw new ConflictHttpException('Wrong email or password', code: 401);
        }

        $token = $user->createToken('auth-token');

        $user['token'] = $token->plainTextToken;

        return $user;
    }

}
