<?php

namespace App\Library;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Authenticate {
    public function authGoogle($data) {
        $user = User::updateOrCreate(
            ['email' => $data->email],
            [
                'name' => $data->name,
                'avatar' => $data->picture,
                'password' => bcrypt('password'),
            ]
        );
        Auth::login($user);
        Session::put('auth', true);

        return redirect()->to('/home');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
    }
}