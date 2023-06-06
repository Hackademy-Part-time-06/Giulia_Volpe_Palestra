<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show', 'index');
      }
    public function index(){
        $category = Category::all();
        return view('category.homepage', ['categories'=> $category]);
    }

    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $request){
        Category::create([
            "name" => $request->name,
            "abstract" => $request->abstract
        ]);
        return redirect()->route('category.home')->with('success', 'Creazione avvenuta con successo!');
    }


    public function show(Category $category){
        return view('category.show', compact('category'));
    }
}
