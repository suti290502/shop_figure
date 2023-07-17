<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SignupController extends Controller
{
    public function getSignup()
    {
        return view('client.page.signup');
    }

    public function postSignup(Request $request)
    {
        $user = new User();
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->email = $request->email;
                $user->address = $request->address;
                $user->phone_number = $request->phone_number;
                $user->role = $request->role;
                $user->save();

                return redirect()->route('client.page.signin')->with('success', 'Signup Successful!');
       
    }
}
