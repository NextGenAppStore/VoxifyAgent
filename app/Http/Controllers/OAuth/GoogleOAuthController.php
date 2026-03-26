<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Socialite;

class GoogleOAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')
            ->scopes([

            ])
            ->redirect();
    }
}
