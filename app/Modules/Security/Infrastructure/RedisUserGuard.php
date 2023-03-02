<?php

namespace App\Modules\Security\Infrastructure;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Redis\Connections\PhpRedisConnection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;

class RedisUserGuard implements Guard
{
    private ?Authenticatable $user = null;

    public function check(){
        if (!empty($_COOKIE['name'])) {
            $name = $_COOKIE['name'];
            Auth::attempt($name);
        }
        return $this->hasUser();
    }

    public function attempt($name){
        $redisUserData = Redis::hgetAll("user:$name");

        if (!$redisUserData) {
            return false;
        }

        $user = new RedisUser($name, $redisUserData['password']);

        $this->setUser($user);

        return $user;
    }

    public function logout()
    {
        if (Cookie::forget('name')){
            return ['success' => true];
        }

        return ['success' => false];
    }

    public function basic()
    {
        if (!empty($_COOKIE['name'])) {
            $name = $_COOKIE['name'];
            Auth::attempt($name);
        }
    }

    public function guest(){
        throw new \LogicException('This is not a valid flow!');
    }

    public function user(){
        return $this->user;
    }

    public function id(){
        throw new \LogicException('This is not a valid flow!');
    }

    public function validate(array $credentials = []){
        throw new \LogicException('This is not a valid flow!');
    }

    public function hasUser(){
        return $this->user() !== null;
    }

    public function setUser(Authenticatable $user){
        $this->user = $user;
    }

}
