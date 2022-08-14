<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class ResettingPasswordController extends Controller
{
    public function create()
    {
        return view('reset-password');
    }

    public function createForgot()
    {
        return view('forgot-password');
    }
    public function createEmail(Request $request)
    {
        return view('email-password',['request' => $request]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'old_password' => ['required',],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.
            $password = User::findOrFail(auth()->user()->user_id);
            $password->password = Hash::make($request->password);
            $password->remember_token =  Str::random(60);
            $password->update();
          
            return back()->with(['msg'=>'Reset Password Successful']);
        }else{
            return back()->with(['msg'=>'Your Original Password is Wrong!']);
        }
    }
}
