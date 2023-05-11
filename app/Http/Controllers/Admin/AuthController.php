<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('screens.admin.login');
    }

    public function processLogin(LoginRequest $request)
    {
        $remember = $request->remember ? true : false; 

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credential, $remember)) {
            return to_route('admin.dashboard');
        }

        return back()
                ->withInput()
                ->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return to_route('admin.login');
    }
}
