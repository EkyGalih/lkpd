<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index($token)
    {
        $expired = PasswordReset::where('token', '=', $token)->first();
        if ($expired->token_use == 1){
            return view('auth.passwords.expired');
        } elseif ($expired->token_use == 0) {
            return view('auth.passwords.reset', compact('token'));
        }
    }

    public function update(Request $password, $token)
    {
        $email = PasswordReset::where('token', '=', $token)->first();
        if ($password->password1 != $password->password2) {
            return redirect()->back()->with(['warning' => 'Password tidak sama!']);
        } else {
            $user = User::where('email', '=', $email->email)->first();
            $user->update([
                'password' => Hash::make($password->password1)
            ]);
            PasswordReset::where('token', '=', $token)->update(['token_use' => '1']);
            return view('auth.passwords.done');
        }
    }

    public function notif()
    {
        return view('auth.passwords.confirm');
    }
}
