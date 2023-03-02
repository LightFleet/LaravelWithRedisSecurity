<?php

namespace App\Modules\Security\Api\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class SecurityController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkAuth()
    {
        return ['isAuthenticated' => Auth::check()];
    }

    public function register(Request $request)
    {
        $login = (string)$request->input('login');
        $password = (string)$request->input('password');

        $registered = Redis::hset("user:$login", "password", "$password");

        if (!$registered) {
            return ['message' => 'Registration failed!', 'success' => false];
        }

        return response(
            ['message' => 'You\'re registered successfully!', 'success' => true]
        )->withCookie(cookie('name', $login));
    }

    public function logout()
    {
        return ['success' => Auth::logout()];
    }

    public function userInfo()
    {
        return [
            'name' => (Auth::user())->getAuthIdentifier()
        ];
    }
}
