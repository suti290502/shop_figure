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
        if($request->isMethod('POST')){
            $validator=validator::make($request->all(),[
                'username'=>'required',
                'email'=>'required|email|max:100',
                'password'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
 
            $credentials = $request->only('username','email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                Auth::login($user); // Lưu thông tin người dùng vào session

                if ($user->role== 1) {
                    $request->session()->put('user', Auth::user());
                    return redirect()->route('seller.page.index')->with('login','Login Successfully');
                } elseif ($user->role == 2) {
                    // Xử lý cho role 2
                    $request->session()->put('user', Auth::user());
                    return redirect()->route('customer.page.index')->with('login','Login Successfully');
                } elseif ($user->role == 3) {
                    $request->session()->put('user', Auth::user());
                    return redirect()->route('admin.all.index')->with('login','Login as Admin Successfully!');
                }
            }
            else{
                    return redirect()->route('client.page.signin')->with('fail','Login Failed!');
            }
        }
    }

       

   
}