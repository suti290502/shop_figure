<?php

namespace App\Http\Controllers;

use App\Models\Usermanagement;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Usersindex(){
        $user=Usermanagement::all();
        return view('admin.page.listUsers', compact('user'));
    }

    public function getEditUsers($id){
        $data['user']=Usermanagement::find($id);
        return view('admin.page.editUsers',$data);
    }

    public function postEditUsers(Request $request,$id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'password'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $user=Usermanagement::find($id);
            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.user.index')->with('success','Edit password Successfully!');
        }
    }

    public function deleteUsers($id){
        $figure=Usermanagement::find($id);
        $figure->delete();
        return back();
    }
}
