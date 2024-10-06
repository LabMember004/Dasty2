<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

 


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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category' => 'required',
        ]);
    
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->file('image')->store('images', 'public');
        $product->category = $request->input('category');
        $product->user_id = auth()->id(); 
        $product->save();
        
    
        return redirect()->route('welcome')->with('success', 'Product created successfully.');
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
        $product = Product::findOrFail($id);
    $products = Product::all(); 
    $relatedProducts = $product->relatedProducts();
    
    return view('products.show', compact('product', 'products' , 'relatedProducts'));
    }
    public function filterByCategory($category)
{
    $products = Product::where('category', $category)->get();
    return view('welcome', compact('products'));
}

public function myProduct()
{
    $products = Product::where('user_id', Auth::id())->get(); 
    return view('products.myProduct', compact('products'));
}
public function favorite($productId)
{
    $user = auth()->user();

    // Check if the favorite already exists
    $existingFavorite = Favorite::where('user_id', $user->id)
                                ->where('product_id', $productId)
                                ->first();

    if (!$existingFavorite) {
        // Create a new favorite record
        Favorite::create([
            'user_id' => $user->id,
            'product_id' => $productId
        ]);
    }

    return redirect()->back();
}




public function showFavorites()
{
    $user = auth()->user();
    $favorites = $user->favorites()->with('product')->get(); // Fetch favorites with related products

    $products = $favorites->pluck('product'); // Get the actual products

    return view('products.favorites', compact('products'));
}
public function unfavorite($productId)
{
    $user = auth()->user();

    // Find and delete the favorite record
    $favorite = Favorite::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

    if ($favorite) {
        $favorite->delete();
    }

    return redirect()->back();
}


}
