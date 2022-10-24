<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
        {
            $credentials = [
                'email' => $request->username,
                'password' => $request->password
            ];
        } else {
            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];
        }

        $user = User::where('username', '=', $request->username)->orWhere('email', '=', $request->username)->first();

        if (Auth::attempt($credentials, $request->rememberme))
        {
            if ($user->jenis_pegawai == 'admin') {
                return redirect()->route('admin');
                // return Redirect::to(env('ADMIN'));
            } elseif ($user->jenis_pegawai == 'pegawai') {
                return redirect()->route('pegawai');
                // return Redirect::to(env('PEGAWAI'));
            } elseif ($user->jenis_pegawai == 'pimpinan') {
                return redirect()->route('pimpinan');
                // return Redirect::to(env('PIMPINAN'));
            }
            return redirect()->route('index');
        }

        return redirect()->back()->with(['warning' => 'Login gagal, pastikan username dan password anda benar']);
    }

    public function not_found()
    {
        return view('error.404');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
