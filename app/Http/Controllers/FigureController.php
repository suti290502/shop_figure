<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Figure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FigureController extends Controller
{
   
        public function Figureindex(){
            $figure=Figure::all();
            return view('admin.page.listFigure', compact('figure'));
        }
    
        public function getAddFigure(){
            $categories=Category::all();
            return view('admin.page.addFigure', ['categories'=>$categories]);
        }
    
        public function postAddFigure(Request $request){
            if($request->isMethod('POST')){
                $validator=Validator::make($request->all(),[
                    'name'=>'required',
                    'description'=>'required',
                    'price'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg|max:5000',
                    'quantity'=>'required',
                    
                   
                    
                ]);
    
                if($validator->fails()){
                    return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
                }
    
                $figure= new Figure;
                $figure->category=$request->category_id;
                $figure->name=$request->name;
                $figure->description=$request->description;
                $figure->price=$request->price;
                $figure->quantity=$request->quantity;
               
                
                
                if($request->file('image')){
                    $file=$request->file('image');
                    $filename=date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('public/image'),$filename);
                    $figure['image']=$filename;
                }
                else{
                    $filename='noname.jpg';
                }
                $figure->save();
                return redirect()->route('admin.figure.index')->with('success','Add new Figure Successfully!');
            }
        }
    
        public function getEditFigure($figure_id){
            $categories=Category::all();
            $data['figure']=Figure::find($figure_id);
            return view('admin.page.editFigure',$data,compact('categories'));
        }
    
        public function postEditFigure(Request $request,$figure_id){
            if($request->isMethod('POST')){
                $validator=Validator::make($request->all(),[
                    'name'=>'required',
                    'description'=>'required',
                    'price'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg|max:5000',
                    'quantity'=>'required',
                    
                    
                    
                ]);
    
                if($validator->fails()){
                    return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
                }
    
                $figure=Figure::find($figure_id);
                $figure->category=$request->category_id;
                $figure->name=$request->name;
                $figure->description=$request->description;
                $figure->price=$request->price;
                $figure->quantity=$request->quantity;
               
                
                
                if($request->file('image')){
                    $file=$request->file('image');
                    $filename=date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('public/image'),$filename);
                    $figure['image']=$filename;
                }
                else{
                    $filename='noname.jpg';
                }
                $figure->save();
                return redirect()->route('admin.figure.index')->with('success','Edit the Figure Successfully!');
            }
        }
    
        public function deleteFigure($figure_id){
            $figure=Figure::find($figure_id);
            $figure->delete();
            return back();
        }
    
        public function figure(){
            return view('client.page.figure');
        }
    
        public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $figures = Figure::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get();

        return view('client.page.search', compact('figures'));
    }
}



