<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('product.index')
                ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.form')
                ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'image' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Crear un nuevo usuario y cifrar la contraseña
        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->image = $validated['image'];
        $product->category_id = $validated['category_id'];
        $product->price = $validated['price'];
        $product->save();

        Session::flash('message', 'Registro exitoso');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.form')
                ->with('product', $product)
                ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:200',
            'image' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);        
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->image = $request['image'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->save();

        Session::flash('message', 'Registro editado');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('message', 'Registro eliminado');
        return redirect()->route('product.index');
    }
}
