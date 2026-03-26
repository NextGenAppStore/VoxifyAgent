<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class GoogleOAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            // ->scopes([

            // ])
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        dd($googleUser);
        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'credentials' => [
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
                'expires_in' => $googleUser->expiresIn,
            ],
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
