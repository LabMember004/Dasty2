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
                <a href="{{ route('products.show', $product->id) }}" class="product-group-item" style="text-decoration: none; color: inherit;">
                    <div class="product-card">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p> <!-- Limit description to 100 characters -->
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection