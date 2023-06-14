<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Figure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create(){
        return view('category.create');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $newCategory = new Category();
            $newCategory->name = $request->name;
            $newCategory->save();
            return redirect()->route('category.index')
                ->with('success', 'Category created successfully.');
        }
    }
    
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $category = Category::find($id);
            if ($category != null) {
                $category->name = $request->name;
              
                $category->save();
                return redirect()->route('category.index')
                    ->with('success', 'Category updated successfully');
            } else {
                    return redirect()->route('category.index')
                    ->with('Error', 'Category not update');
                }
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}