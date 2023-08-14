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

        $figures = Figure::where('category', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get();

        return view('client.page.search', compact('figures'));
    }

    





    

    public function index()
    {
        $figures = Figure::latest()->paginate(10);
        return view('figures.index', compact('figures'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function create()
    {
        $categories = Category::all();
        return view('figures.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5000',
                'quantity' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            // ... (the existing code for handling the image file)
    
            $newFigure = new Figure();
            $newFigure->name = $request->name;
            $newFigure->description = $request->description;
            $newFigure->price = $request->price;
            $newFigure->image = $fileName;
            $newFigure->quantity = $request->quantity;
            $newFigure->category = $request->category;
    
            $newFigure->save();
    
            return redirect()->route('figures.index')->with('success', 'Figure added successfully.');
        }
    }
    
    public function show($figure_id)
    {
        $figure = Figure::find($figure_id);

        if (!$figure) {
            abort(404); // Display a 404 error page if the figure is not found.
        }

        return view('figures.show', ['figure' => $figure]);
    }
   
    
    public function edit($figure_id)
    {
        $categories = Category::all();
        $figures = Figure::with('category')->find($figure_id);
        return view('figures.edit', ['figures' => $figures, 'categories' => $categories]);
    }
    public function update(Request $request, $figure_id)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name'=>'required',
                    'description'=>'required',
                    'price'=>'required',
                        
                    'quantity'=>'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }
            $fileName = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('public/image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            
            $figures = Figure::find($id);
            if ($figures != null) {
                $figures->name = $request->name;
                $figures->description = $request->description;
                $figures->price = $request->price;
                $figures->image = $fileName;
                $figures->quantity = $request->quantity;
                $figures->category = $request->category;
               
                if ($fileName) {
                    $figures->image = $fileName;
               
                }
                $figures->save();
                return redirect()->route('figures.index')
                    ->with('success', 'Figure updated successfully');
            } else {
                return redirect()->route('figures.index')
                    ->with('Error', 'figure not update');

            }

        }
    }
    public function destroy($figure_id)
    {
        $figure = Figure::find($figure_id);
        $image_path = "/public/image/.$figure->image"; 
      
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
       
        $figure->delete();
        return redirect()->route('figures.index')
            ->with('success', 'Figure deleted successfully');
    }

    public function demo()
    {
        $figures = Figure::latest()->paginate(5);
        return view('demo', compact('figures'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function detail(Request $request, $id)
    {
        $figure = Figure::find($id);
        if (!$figure) {
            abort(404);
        }
        return view('pages.detail', ['figure' => $figure]);
    }
}




