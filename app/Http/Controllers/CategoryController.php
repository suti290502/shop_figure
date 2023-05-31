<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Xem danh sách danh mục
    public function index()
    {
        $categories = Category::all();
        
        return view('category.index', compact('categories'));
    }

    // Xem chi tiết danh mục
    public function show($category_id)
    {
        $category = Category::findOrFail($category_id);
        
        return view('category.show', compact('category'));
    }

    // Thêm danh mục
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $data['name'];
        $category->save();

        return redirect()->route('category.index')->with('success', 'Danh mục đã được thêm thành công.');
    }

    // Chỉnh sửa danh mục
    public function update(Request $request, $category_id)
    {
        $category = Category::findOrFail($category_id);

        $data = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->name = $data['name'];
        $category->save();

        return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    // Xoá danh mục
    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Danh mục đã được xoá thành công.');
    }
}
