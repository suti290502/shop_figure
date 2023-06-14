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
    public function index()
    {
        $figures = Figure::latest()->paginate(5);
        return view('figure.index', compact('figures'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $categories = Category::all();
        return view('figure.create', ['categories' => $categories]);
        $sellers = User::all();
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [

                'name' => 'required',
                'description' => 'required',
                'price'=> 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:100000',
                'quantity' => 'required',
                
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('image/figure');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);

            } else {
                $fileName = 'noname.jpg';
            }
            
            $newFigure = new Figure();
            $newFigure->seller_id = $request->user;
            $newFigure->category= $request->category; 
            $newFigure->name = $request->name;
            $newFigure->description = $request->description;
            $newFigure->price = $request->price;
            $newFigure->image = $fileName;
            $newFigure->quantity = $request->quantity;
            $newFigure->category= $request->category; 
            
            $newFigure->save();
            return redirect()->route('figure.index')
                ->with('success', 'figure Add successfully.');
        }
        
    }
    public function show($id)
    {
        $figure = Figure::find($id);
        return view('figure.show', ['figure' => $figure]);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $figure = Figure::with('category')->find($id);
        return view('figure.edit', ['figure' => $figure, 'categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required',
                'quantity' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }
            $fileName = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('image/figure');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }

            $figure = Figure::find($id);
            if ($figure != null) {
                $figure->seller_id = $request->user;
                $figure->category= $request->category;
                $figure->name = $request->name;
                $figure->description = $request->description;
                $figure->price = $request->price;
                $figure->image = $fileName;
                $figure->quantity = $request->quantity;
              

               
                if ($fileName) {
                    $figure->image = $fileName;
                }
                $figure->save();
                return redirect()->route('figure.index')
                    ->with('success', 'figure updated successfully');
            } else {
                return redirect()->route('figure.index')
                    ->with('Error', 'figure not update');

            }

        }
    }
    public function destroy($id)
    {
        $figure = Figure::find($id);
        $image_path = "/image/figure/.$figure->image"; 
       
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
       
        $figure->delete();
        return redirect()->route('figure.index')
            ->with('success', 'figure deleted successfully');
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



