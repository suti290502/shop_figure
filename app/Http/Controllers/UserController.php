<?php

namespace App\Http\Controllers;

use App\Models\Usermanagement;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Valuser_idator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Usersindex(){
        $user=Usermanagement::all();
        return view('admin.page.listUsers', compact('user'));
    }

    public function getEditUsers($user_id){
        $data['user']=Usermanagement::find($user_id);
        return view('admin.page.editUsers',$data);
    }

    public function postEditUsers(Request $request,$user_id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'username'=>'required',
                'password'=>'required',
                'email'=>'required',
                'address'=>'required',
                'phone_number'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $user=Usermanagement::find($user_id);
            $user->username=$request->username;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->phone_number=$request->phone_number;
            $user->password=Hash::make($request->password);
            
            $user->save();
            return redirect()->route('admin.user.index')->with('success','Edit password Successfully!');
        }
    }

    public function deleteUsers($user_id){
        $figure=Usermanagement::find($user_id);
        $figure->delete();
        return back();
    }
}
