<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.loginForm');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->only('email', 'password');
        $validator = Validator::make($credential, [
            'email' => 'required',
            'password' => 'required',
        ]);

        //cek validasi form
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->withInput($request->all());
        }

        //check credensial 
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['message' => 'Akun Salah / Tidak Ditemukan!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
