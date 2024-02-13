<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getlogin() {

        return view('user.login');
        
    }

    public function login(Request $request)  {

        $validate = $request ->validate([
                'email' => 'required|email',
                'password' =>'required',
        ]);
        if(Auth::attempt($validate)){

            return view('user.profile', compact('request'));
        }

        return redirect()->back()->with('error', 'UserEmail Or Password Invalid!');
    }
}
