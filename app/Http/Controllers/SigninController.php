<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function getSignin(){
        return view('client.page.signin');
    }

    public function postSignin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'email' => 'required|email|max:100',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('client.page.signin')->withErrors($validator)->withInput();
    }

    $credentials = $request->only('username', 'email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role == 1) {
            return redirect()->route('seller.page.index')->with('login', 'Login Successfully');
        } elseif ($user->role == 2) {
            return redirect()->route('customer.page.index')->with('login', 'Login Successfully');
        } elseif ($user->role == 3) {
            return redirect()->route('admin.all.index')->with('login', 'Login as Admin Successfully!');
        }
    }

    return redirect()->route('client.page.signin')->with('fail', 'Login Failed!');
}


       

   
}