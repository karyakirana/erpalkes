<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\ClosedCash;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function index()
    {
        // login view
    }

    public function indexRegister()
    {
        // register view
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => 'guest',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // check and add session closed cash
        $idUser = Auth::id();
        $request->session()->put('ClosedCash', $this->ClosedCash($idUser));

        return redirect(RouteServiceProvider::HOME);
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $idUser = Auth::id();
        $request->session()->put('ClosedCash', $this->ClosedCash($idUser));

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Handle Closed Cashed after login to session
     * @param number $idUser ID USER
     * @return string Active Closed id
     */
    public function ClosedCash($idUser)
    {
        $data = ClosedCash::whereNull('closed')->latest()->first();
        if ($data) {
            // jika null maka buat data
            return $data->active_cash;
        }
        $generateClosedCash = md5(now());
        $isi = [
            'active_cash' => $generateClosedCash,
            'user_id' => $idUser,
        ];
        $createData = ClosedCash::create($isi);
        return $generateClosedCash;

    }

}
