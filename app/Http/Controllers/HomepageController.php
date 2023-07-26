<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){
        $homepage= Homepage::all();
        return view('client.page.index', compact('homepage'));
        
    }

    
    public function home(){
        $home= Homepage::all();
        return view('customer.page.index', compact('home'));
    }
    
    public function homesell(){
        $homesell= Homepage::all();
        return view('seller.page.index', compact('homesell'));
    }

 
        public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // Tìm các figure có tên trùng khớp với từ khóa
        $figures = Figure::where('name', 'like', '%' . $keyword . '%')->get();
        // Trả về view hiển thị kết quả tìm kiếm
        return view('home.search', ['figure' => $figures]);
    }
}
