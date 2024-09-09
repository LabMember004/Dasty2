<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <h1>Product Details</h1>
    
    <div class="product-detail">
        <h2>{{ $product->name ?? "" }}</h2>
        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Category:</strong> {{ $product->category }}</p>
        
        <!-- Show Edit and Delete buttons only if the user is the creator -->
        @if (Auth::check() && Auth::id() === $product->user_id)
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif

        <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="btn btn-success">Favorite</button>
        </form>

        <br>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products List</a>
    </div>
@endsection
