<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UserHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    function __construct(){
        $this->userHelp = new UserHelper();
    }

    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'kduser' => 'required|string',
            'pwd' => 'required|string',
        ]);

        $user = User::where('kduser', $request->kduser)->first();

        if ($user) {
            $decryptedPwd = $this->userHelp->decryptPassword($user->pwd);

            if ($request->pwd === $decryptedPwd) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'login' => 'Kode pengguna atau kata sandi salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
