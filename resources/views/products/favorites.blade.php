<!-- resources/views/products/favorites.blade.php -->

@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
    <h1>My Favorite Products</h1>

    <div class="product-group">
        @foreach($favorites as $product)
            <div class="product-group-item">
                <x-card-style :product="$product" />
            </div>
        @endforeach
    </div>
@endsection
