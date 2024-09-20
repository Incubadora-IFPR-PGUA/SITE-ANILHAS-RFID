<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Models\User;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Library\GoogleClient;
use App\Library\Authenticate;

class RegisteredUserController extends Controller {
    public function create(): View {
        $googleClient = new GoogleClient;
        $googleClient->init();

        if ($googleClient->authenticated()){
            $auth = new Authenticate();
            return $auth->authGoogle($googleClient->getData());
        }

        return view('auth.login', ['authUrl' => $googleClient->generateLink()]);
    }

    public function store(Request $request): RedirectResponse {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
        ]);
        event(new Registered($user));
        Auth::login($user);
        PermissionController::loadPermissions(Auth::user()->role_id);

        return redirect(RouteServiceProvider::HOME);
    }
}