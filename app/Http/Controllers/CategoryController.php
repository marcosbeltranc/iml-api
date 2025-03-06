<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(5);
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'image' => 'required|string|max:200',
        ]);

        // Crear un nuevo usuario y cifrar la contraseña
        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->image = $validated['image'];
        $category->save();

        Session::flash('message', 'Registro exitoso');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category)
    {
        return view('category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.form')
                ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'image' => 'required|string|max:200',
        ]);        
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->image = $request['image'];
        $category->save();

        Session::flash('message', 'Registro editado');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        Session::flash('message', 'Registro eliminado');
        return redirect()->route('category.index');
    }
}
