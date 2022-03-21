<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginsession(Request $request)
    {

        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->role == 'Super Admin') {
                return redirect('/superadmin');
            } elseif (auth()->user()->role == 'Admin') {
                return redirect('/admin');
            } elseif (auth()->user()->role == 'Bendesa') {
                return redirect('/admin');
            } elseif (auth()->user()->role == 'Kelian Banjar') {
                return redirect('/banjar');
            } else {
                return redirect('/krama');
            }
        }

        return redirect('/login') ->withInput()
                                  ->withErrors(['login_gagal' => 'Username atau Password tidak cocok!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/login');
    }

}
