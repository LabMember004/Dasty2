<!-- resources/views/products/favorites.blade.php -->

@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
    <h1>My Favorite Products</h1>

    <div class="product-group">
        @foreach($products as $product)
            <div class="product-group-item">
                <x-card-style :product="$product" />

                <!-- Unfavorite Form -->
                <form action="{{ route('products.unfavorite', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Unfavorite</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
