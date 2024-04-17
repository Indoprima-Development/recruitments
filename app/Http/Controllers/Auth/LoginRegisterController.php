<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;
use RealRashid\SweetAlert\Facades\Alert;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'ktp' => 'required',
            'nohp' => 'required'
        ]);

        $user = User::where('ktp', $request->ktp)->orWhere('nohp', $request->nohp)->first();
        if (!empty($user)) {
            SaveSession('user', $user);
            Auth::login($user);
            $user->update([
                'name' => $request->name,
                'ktp' => $request->ktp,
                'nohp' => $request->nohp
            ]);
            $request->session()->regenerate();
            return redirect('/')->withSuccess('You have successfully logged in!');
        }
         else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->ktp."@mail.com",
                'ktp' => $request->ktp,
                'nohp' => $request->nohp,
                'role' => 'user',
            ]);

            SaveSession('user', $user);
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/')->withSuccess('You have successfully logged in!');
        }

        Alert::error('Failed!', 'Your provided credentials do not match in our records.');

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
}
