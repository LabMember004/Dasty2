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

        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products List</a>
    </div>
@endsection
