<?php



namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function getAllUser() {
        $user = User::paginate(10); // Sửa lại tên class User ở đây
        return view('listUser', compact('user'));
    }

    public function postLogin(Request $request){
        $arr = ['username' => $request->username, 'password' => $request->password];
        if(Auth::attempt($arr)){
            return redirect()->route('listUser')->with('message', 'Thành công');
        } else{
            return redirect()->route('getLogin')->with('message', 'That bai');
        }
    }

    public function destroy($user_id)
    {
        $user_id = User::find($user_id);
        $user_id->delete();
        return redirect()->route('listUser')
            ->with('success', 'Category deleted successfully');
    }

    public function edit($user_id)
    {
        $user = User::paginate(10);
        return view('user.edit', ['user' => $user]);
    }

    

    public function showForm()
    {
        $sellers = User::pluck('username', 'user_id');

        return view('form', ['sellers' => $sellers]);
    }

}
