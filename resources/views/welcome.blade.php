<!-- resources/views/products/welcome.blade.php -->

@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to the Product CRUD Application</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    <form method="GET" action="{{ route('products.search') }}">
        <input type="text" name="query" placeholder="Search by title" value="{{ request()->input('query') }}">
        <button type="submit">Search</button>
    </form>
    <div class="mt-5">
        <h2>Products List</h2>
        
        <div class="product-group">
            @foreach($products as $product)
                <div class="product-group-item">
                    <x-card-style :product="$product" />
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
