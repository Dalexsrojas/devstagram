<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Http\JsonResponse;
class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     */
 public function login(LoginRequest $request)
{
    $credentials = $request->only('username', 'password');

    if (!Auth::attempt($credentials)) {
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return redirect()->route('login.index')
                ->withErrors(['username' => 'Usuario no existe.'])
                ->withInput($request->only('username'));
        }
        return redirect()->route('login.index')
            ->withErrors(['password' => 'Contraseña incorrecta.'])
            ->withInput($request->only('username'));
    }

    $request->session()->regenerate();

    return redirect()->intended(route('dashboard'));
}



    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {

    }
}
