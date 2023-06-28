<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Categoryindex(){
        $category=Category::all();
        return view('admin.page.listCategory', compact('category'));
    }

    public function getAddCategory(){
        return view('admin.page.addCategory');
    }

    public function postAddCategory(Request $request){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
               
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $category=new Category;
            $category->name=$request->name;
            $category->save();
            return redirect()->route('admin.category.index')->with('success','Add new Category Successfully!');
        }
    }

    public function getEditCategory($category_id){
        $data['cate']=Category::find($category_id);
        return view('admin.page.editCategory',$data);
    }

    public function postEditCategory(Request $request,$category_id){
        if($request->isMethod('POST')){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
               
            ]);

            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $category=Category::find($category_id);
            $category->name=$request->name;
          
            $category->save();
            return redirect()->route('admin.category.index')->with('success','Edit the Category Successfully!');
        }
    }

    public function deleteCategory($category_id){
        $category=Category::find($category_id);
        $category->delete();
        return back();
    }
}
