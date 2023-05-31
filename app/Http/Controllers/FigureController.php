<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figure;
use App\Models\Category;

class FigureController extends Controller
{
    // Xem danh sách sản phẩm
    public function index()
    {
        $figures = Figure::all();

        return view('figure.index', compact('figures'));
    }

    // Xem chi tiết sản phẩm
    public function show($figure_id)
    {
        $figure = Figure::findOrFail($figure_id);

        return view('figure.show', compact('figure'));
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = Category::all();

        return view('figure.create', compact('categories'));
    }

    // Lưu sản phẩm mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $data = $request->validate([
            'seller_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'quantity' => 'required|integer',
        ]);

        $figure = new Figure();
        $figure->seller_id = $data['seller_id'];
        $figure->category_id = $data['category_id'];
        $figure->name = $data['name'];
        $figure->description = $data['description'];
        $figure->price = $data['price'];
        $figure->image = $data['image'];
        $figure->quantity = $data['quantity'];
        $figure->save();

        return redirect()->route('figure.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($figure_id)
    {
        $figure = Figure::findOrFail($figure_id);
        $categories = Category::all();

        return view('figure.edit', compact('figure', 'categories'));
    }

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    public function update(Request $request, $figure_id)
    {
        $figure = Figure::findOrFail($figure_id);

        $data = $request->validate([
            'seller_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'quantity' => 'required|integer',
        ]);

        $figure->seller_id = $data['seller_id'];
        $figure->category_id = $data['category_id'];
        $figure->name = $data['name'];
        $figure->description = $data['description'];
        $figure->price = $data['price'];
        $figure->image = $data['image'];
        $figure->quantity = $data['quantity'];
        $figure->save();

        return redirect()->route('figure.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    // Xoá sản phẩm khỏi cơ sở dữ liệu
    public function destroy($figure_id)
    {
        $figure = Figure::findOrFail($figure_id);
        $figure->delete();

        return redirect()->route('figure.index')->with('success', 'Sản phẩm đã được xoá thành công.');
    }
}
