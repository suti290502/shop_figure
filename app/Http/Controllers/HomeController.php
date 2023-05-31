<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Figure;
use Illuminate\Routing\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    
    {
        $categories = Category::all();
        $figures = Figure::all();

        return view('home.index', compact('categories', 'figures'));
    }
}

