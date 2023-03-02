<?php

namespace App\Modules\Security\Infrastructure;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Redis\Connections\PhpRedisConnection;
use Illuminate\Support\Facades\Redis;

class RedisUserProvider implements UserProvider
{
    public function __construct()
    {
    }

    public function retrieveById($identifier) {
        throw new \LogicException('This is not a valid flow!');
    }

    public function retrieveByToken($identifier, $token) {
        throw new \LogicException('This is not a valid flow!');
    }

    public function updateRememberToken(Authenticatable $user, $token) {
        throw new \LogicException('This is not a valid flow!');
    }

    public function retrieveByCredentials(array $credentials) {
        $name = $credentials['name'];
        $pass = $credentials['password'];

        return new RedisUser($name, $pass);
    }

    public function validateCredentials(Authenticatable $user, array $credentials) {
        throw new \LogicException('This is not a valid flow!');
    }
}
