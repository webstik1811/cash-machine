<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class Callback extends Controller
{
    public function __invoke()
    {
        $user = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'github_id' => $user->id,
        ], [
            'name' => $user->name ?? $user->email,
            'password' => $user->email,
            'email' => $user->email,
            'github_token' => $user->token,
        ]);

        Auth::login($user);

        return redirect()->route('view.transaction.list');
    }
}
