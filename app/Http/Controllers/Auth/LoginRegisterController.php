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
        $user = User::where("email",$request->email)
        ->orWhere("ktp",$request->ktp)
        ->first();

        if (!empty($user)) {
            Alert::error('Error', 'Email atau KTP sudah terdaftar');
            return redirect()->back();
        }
        // dd($request);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ktp'      => $request->ktp,
            'no_wa'    => $request->no_wa,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'asal_instansi'       => $request->asal_instansi,
            'jurusan'             => $request->jurusan,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        Alert::success('Success', 'Akun berhasil dibuat.');
        return redirect('opening-jobs');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // $user = User::where('ktp', $request->ktp)->orWhere('nohp', $request->nohp)->first();
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if (Hash::check($request->password, $user->password)) {
                Auth::attempt($credentials);
                $request->session()->regenerate();
                return redirect('vacancies');
            }
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
