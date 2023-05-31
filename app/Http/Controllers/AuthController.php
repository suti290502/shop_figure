<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use GrahamCampbell\ResultType\Success;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra xác thực đăng nhập
        if (auth()->attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('/home');
        } else {
            // Đăng nhập thất bại
            return back()->withErrors(['email' => 'Đăng nhập không thành công. Vui lòng kiểm tra lại email và mật khẩu.']);
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Đăng nhập người dùng mới
        auth()->login($user);

        // Đăng ký thành công
        return redirect('/home');
    }
}
