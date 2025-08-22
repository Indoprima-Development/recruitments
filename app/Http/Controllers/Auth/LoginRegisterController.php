<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Constants\Constants;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = User::where("email", $request->email)
            ->orWhere("ktp", $request->ktp)
            ->first();

        if (!empty($user)) {
            return view('auth.alreadyRegistered', compact('user'));
        }

        $tokenGenerate = GenerateRandomString();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ktp'      => $request->ktp,
            'no_wa'    => $request->no_wa,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'asal_instansi'       => $request->asal_instansi,
            'jurusan'             => $request->jurusan,
            'ipk'                 => $request->ipk,
            'berat_badan'         => (int)$request->berat_badan,
            'tinggi_badan'        => (int)$request->tinggi_badan,
            'is_active'           => 0,
            'active_token'        => $tokenGenerate,
        ]);

        Alert::success('Success', 'Akun berhasil dibuat. Silahkan melakukan konfirmasi email');

        SendMail($request->name, $tokenGenerate, $request->email, 'Verifikasi Pendaftaran Akun');

        $email = $request->email;
        return view('auth.successRegister', compact('email'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginAdminRoot()
    {
        return view('auth.login-admin-root');
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
            if ($user->is_active != 1) {
                return view('auth.emailActivation');
            }

            if (Hash::check($request->password, $user->password)) {

                if ($user->is_active == "" || $user->is_active == 0) {
                    Alert::error('Gagal!', 'Akun belum diaktifkan, harap memeriksa email untuk konfirmasi akun');
                    return redirect()->back();
                }

                Auth::attempt($credentials);
                $request->session()->regenerate();
                return redirect('vacancies');
            }
        }

        Alert::error('Gagal!', 'Email dan Password tidak sesuai.');

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

    public function authenticateAdminRoot(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        // $user = User::where('ktp', $request->ktp)->orWhere('nohp', $request->nohp)->first();
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            if ($user->is_active != 1) {
                return view('auth.emailActivation');
            }

            if ($user->is_active == "" || $user->is_active == 0) {
                Alert::error('Gagal!', 'Akun belum diaktifkan, harap memeriksa email untuk konfirmasi akun');
                return redirect()->back();
            }

            Auth::login($user);
            $request->session()->regenerate();
            return redirect('vacancies');
        }

        Alert::error('Gagal!', 'Email dan Password tidak sesuai.');

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function sendForgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return 1;
        }

        $id = Crypt::encryptString($user->id) . "&dt=" . date('YmdHis');
        SendMail($user->name, $id, $request->email, 'forget password');
        return view('auth.forget-password-send');
    }

    public function forgetPasswordLink(Request $request)
    {
        $id = Crypt::decryptString($request->input("token"));
        $user = User::findOrFail($id);
        $token = Crypt::encryptString($user->id);

        return view('auth.forget-password-change', compact('token'));
    }

    public function changePassword(Request $request)
    {
        $id = Crypt::decryptString($request->input("token"));
        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('auth/login');
    }
}
