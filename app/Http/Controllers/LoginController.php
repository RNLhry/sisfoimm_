<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
use AuthenticatesUsers;
class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect()->intended('home');
        }

        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
