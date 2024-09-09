<!-- resources/views/products/welcome.blade.php -->

@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to the Product CRUD Application</h1>
    <div class="category-buttons mb-3">
        <a href="{{ route('welcome') }}" class="btn btn-secondary">All</a>
        <a href="{{ route('products.filter', 'Cars') }}" class="btn btn-primary">Cars</a>
        <a href="{{ route('products.filter', 'Electronics') }}" class="btn btn-primary">Electronics</a>
        <a href="{{ route('products.filter', 'Houses') }}" class="btn btn-primary">Houses</a>
    </div>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    <form method="GET" action="{{ route('products.search') }}">
        <input type="text" name="query" placeholder="Search by title" value="{{ request()->input('query') }}">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('products.myProduct') }}" class="btn btn-primary">My Products</a>
    <a href="{{ route('products.favorites') }}" class="btn btn-primary">My Favorites</a>

    <div class="mt-5">
        <h2>Products List</h2>


        
        <div class="product-group">
        @foreach($products as $product)
    <div class="product-group-item">
        <x-card-style :product="$product" />

        <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-success">Favorite</button>
        </form>

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