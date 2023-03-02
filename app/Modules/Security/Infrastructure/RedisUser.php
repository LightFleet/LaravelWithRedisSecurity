<?php

namespace App\Modules\Security\Infrastructure;

use Illuminate\Contracts\Auth\Authenticatable;

class RedisUser implements Authenticatable
{
    private string $name;
    private string $password;

    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function getAuthIdentifierName() {
        return 'name';
    }

    public function getAuthIdentifier() {
        return $this->name;
    }

    public function getAuthPassword() {
        throw new \LogicException('This is not a valid flow!');

    }

    public function getRememberToken() {
        throw new \LogicException('This is not a valid flow!');

    }

    public function setRememberToken($value) {
        throw new \LogicException('This is not a valid flow!');

    }

    public function getRememberTokenName() {
        throw new \LogicException('This is not a valid flow!');
    }
}
