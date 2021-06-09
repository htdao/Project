<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function showForm()
    {
       return view('backend.auth.register');
    }

    public function register(Request $request)
    {


        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('backend.home');
    }

}
