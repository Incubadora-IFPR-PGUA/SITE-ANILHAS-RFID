<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\GoogleClient;
use App\Library\Authenticate;
use Socialite;

class AuthenticatedSessionController extends Controller {
    public function create() {
        $googleClient = new GoogleClient;
        $googleClient->init();
        if ($googleClient->authenticated()){
            $auth = new Authenticate();
            return $auth->authGoogle($googleClient->getData());
        }
        return view('auth.login', ['authUrl' => $googleClient->generateLink()]);
    }

    public function store(LoginRequest $request) {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    
    public function destroy(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}