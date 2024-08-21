<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{

    
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function newProduct()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login'); 
        }
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category' => 'required|string|max:255',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create and save the product
        $product = new Product($validatedData);
       
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->storeAs('public/images', $imageName);
            $product->image = $imageName;
        }

        $product->update($request->only(['name', 'description', 'price', 'category']));

        return redirect()->route('welcome')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('welcome');
    }
   
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')->get();
        return view('welcome', compact('products'));
    }
    public function show ($id) {
        $product = Product::find($id);
        return view('products.show' , compact('product'));
    }
    public function filterByCategory($category)
{
    $products = Product::where('category', $category)->get();
    return view('welcome', compact('products'));
}

}
