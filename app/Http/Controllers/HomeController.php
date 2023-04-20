<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Sistemas\Facades\Usuario;
use Modules\Sistemas\Facades\PasswordReset;


class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }

    public function changepassword(Request $request)
    {
        $userdata = array(
            'email' => auth()->user()->email,
            'password' => $request->password
        );
        if (Auth::attempt($userdata)) {
            Usuario::changePassword($request->password_confirm);
            PasswordReset::store();
            try {
                Mail::to(auth()->user()->email)->send(new ResetPassword($request->password_confirm));
            } catch (\Throwable $ex) {
                logger($ex);
            } finally {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/');
            }
        } else {
            return redirect()->route('profile')->with('error', 'Contraseña incorrecta');
        }
    }

    
}
