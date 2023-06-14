<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Figure;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm mới nhất theo dạng slide
        $figure = Figure::orderBy('created_at', 'desc')->take(5)->get();

        return view('home.index', compact('figure'));
    }

        
        public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // Tìm các figure có tên trùng khớp với từ khóa
        $figures = Figure::where('name', 'like', '%' . $keyword . '%')->get();
        // Trả về view hiển thị kết quả tìm kiếm
        return view('home.search', ['figures' => $figures]);
    }
}
