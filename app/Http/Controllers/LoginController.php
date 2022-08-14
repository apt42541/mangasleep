<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('guest.login');
    }
    public function createSession(Request $request)
    {
        $rules =  $request->validate([

            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($rules)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        throw ValidationException::withMessages(['username' => 'Your Authenication is Wrong try again']);
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
