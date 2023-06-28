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
    public function getSignup(){
        return view('client.page.signup');
    }

    public function postSignup(Request $request)
    {
        if($request->isMethod('POST')){
            $validator=validator::make($request->all(),[
                'name'=>'required|min:6|max:1000',
                'email'=>'required|email|max:100',
                'password'=>'required|confirmed|max:16|min:6',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            
            $user=DB::table('users')->where('email',$request->email)->first();
            if(!$user){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role=$request->role;
                $user->save();
                return redirect()->route('client.page.signin')->with('success','Signup Successfully!');
            }
        }
    }
}
