<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Kiểm tra thông tin đăng nhập
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến trang xem thông tin người dùng phù hợp với vai trò
            $role = auth()->user()->role;
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'customer':
                    return redirect()->route('customer.dashboard');
                case 'seller':
                    return redirect()->route('seller.dashboard');
            }
        } else {
            // Đăng nhập thất bại, chuyển hướng đến trang đăng nhập với thông báo lỗi
            return redirect()->route('login')->withErrors(['login' => 'Email hoặc mật khẩu không chính xác']);
        }
    }

    public function register(Request $request)
    {
        // Validate dữ liệu đăng ký
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,customer,seller',
        ]);

        // Tạo người dùng mới
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        // Đăng nhập ngay sau khi đăng ký thành công và chuyển hướng đến trang xem thông tin người dùng phù hợp với vai trò
        auth()->login($user);
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'customer':
                return redirect()->route('customer.dashboard');
            case 'seller':
                return redirect()->route('seller.dashboard');
        }
    }

    public function viewProfile()
    {
        // Lấy thông tin người dùng hiện tại
        $user = auth()->user();

        return view('user.profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        // Lấy thông tin người dùng hiện tại
        $user = auth()->user();

        // Validate dữ liệu chỉnh sửa thông tin người dùng
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        // Cập nhật thông tin người dùng
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->save();

        // Chuyển hướng đến trang xem thông tin người dùng với thông báo cập nhật thành công
        return redirect()->route('user.viewProfile')->with('success', 'Cập nhật thông tin thành công');
    }

    // Các phương thức cho quyền hạn Admin
    public function adminOnlyAction()
    {
        // Kiểm tra xem người dùng hiện tại có quyền Admin không
        if (auth()->user()->role === 'admin') {
            // Logic cho các hoạt động chỉ dành cho Admin
            // ...
        } else {
            // Redirect hoặc trả về lỗi nếu người dùng không có quyền
            abort(403, 'Bạn không có quyền truy cập vào các hoạt động này');
        }
    }

    // Các phương thức cho quyền hạn Customer
    public function customerOnlyAction()
    {
        // Kiểm tra xem người dùng hiện tại có quyền Customer không
        if (auth()->user()->role === 'customer') {
            // Logic cho các hoạt động chỉ dành cho Customer
            // ...
        } else {
            // Redirect hoặc trả về lỗi nếu người dùng không có quyền
            abort(403, 'Bạn không có quyền truy cập vào các hoạt động này');
        }
    }

    // Các phương thức cho quyền hạn Seller
    public function sellerOnlyAction()
    {
        // Kiểm tra xem người dùng hiện tại có quyền Seller không
        if (auth()->user()->role === 'seller') {
            // Logic cho các hoạt động chỉ dành cho Seller
            // ...
        } else {
            // Redirect hoặc trả về lỗi nếu người dùng không có quyền
            abort(403, 'Bạn không có quyền truy cập vào các hoạt động này');
        }
    }
}
