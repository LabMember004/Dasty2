@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.newProduct') }}" class="btn btn-primary mb-3">Add Product</a>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <x-product-card 
                    :name="$product->name" 
                    :description="$product->description" 
                    :price="$product->price" 
                    :image="$product->image" 
                    :category="$product->category" 
                />
            </div>
       
        @endforeach
    </div>
@endsection
