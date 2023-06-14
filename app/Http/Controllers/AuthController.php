<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('username', 'password');

        
        // ...
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('home.index')->with('message', 'Thành công');
          
        } else {
            // Đăng nhập thất bại
            return back()->withErrors(['username' => 'Đăng nhập không thành công']);
        }
        
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation rules
        $rules = [
            'username' => 'required',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:user',
            'address' => 'required',
            'phone_number' => 'required',
            'role' => 'required|in:customer,seller',

            // Các trường khác trong form đăng ký
        ];

        $this->validate($request, $rules);

        // Tạo user mới
        $users = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'role' => $request->input('role'),
            // Các trường khác trong form đăng ký

            $users->save(),

           
        ]);

        // Đăng nhập ngay sau khi đăng ký thành công
        User::login($users);

        return redirect('/dashboard');
    }


    

    public function logout()
    {
        User::logout();
        return redirect('/');
    }
}
