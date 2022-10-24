<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\LupaPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store(Request $details)
    {
        $email = $details->email;
        $user = User::where('email', '=', $details->email)->select('id as user_id', 'users.*')->first();
        if ($user) {
            $token  = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(64))), 0, 64);
            $link   =  route('reset-password', $token);
            $details = [
                'title' => 'Reset Kata Sandi',
                'body' => 'Silahkan klik tautan ini '.$link . ' untuk melakukan perubahan kata sandi anda'
            ];

            PasswordReset::create([
                'email' => $email,
                'token' => $token,
                'token_use' => '0'
            ]);
            Mail::to($email)->send(new LupaPassword($details));

            return redirect()->route('notif-email');
        } else {
            return redirect()->route('notif-email');
        }
    }
}
