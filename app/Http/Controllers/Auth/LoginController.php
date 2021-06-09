<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function showLoginForm()
    {

        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request ->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request ->session()->regenerate();
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Thông tin user không đúng'
            ]);
        }
    }

}
