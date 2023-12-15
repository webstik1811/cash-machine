<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class Login extends Controller
{
    public function __invoke()
    {
        return Socialite::driver('github')->redirect();
    }
}
