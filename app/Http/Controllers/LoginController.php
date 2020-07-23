<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function responseFB()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }

    public function loginFB()
    {
        return Socialite::with('facebook')->redirect();
    }
}
