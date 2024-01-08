<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    // Redirect to this path after successful login
    protected $redirectTo = '/';

    // Redirect to this path after logout
    protected $loggedOutRedirectTo = '/';

    // Customize the login form view
    public function show()
    {
        Log::info('Not logged in');
        if (Auth::check()) {
            return redirect($this->redirectTo);
        }
        return view('pages.user-pages.login');
    }

    // Handle the login process
    public function login(LoginRequest $request)
    {

        $user = User::where(['email' => $request->input('email')])->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->authenticate();
            $request->session()->regenerate();
            Log::info('Logged in');
            return redirect($this->redirectTo);
        }

        throw ValidationException::withMessages([
            $request->email => [trans('auth.failed')],
        ]);
    }



    // Log the user out
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect($this->loggedOutRedirectTo);
    }
}
