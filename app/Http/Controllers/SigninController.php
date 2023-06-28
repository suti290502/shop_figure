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
                'email'=>'required|email|max:100',
                'password'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $remember=$request->remember;
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                if(Auth::user()->role==2){
                    return redirect()->route('client.page.index')->with('login','Login Successfully');
                }
                else{
                    return redirect()->route('admin.all.index')->with('login','Login as Admin Successfully!');
                }
            }
            else{
                return redirect()->route('client.page.signin')->with('fail','Login Failed!');
            }
        }
    }
}