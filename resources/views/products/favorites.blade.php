<!-- resources/views/products/favorites.blade.php -->

@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
<a href="{{ route('products.index') }}">
            <i class="fa-solid fa-arrow-left ml-10" style="font-size: 36px;"></i>
        </a>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">My Favorite Products</h1>

        @if($products->isEmpty())
            <p class="text-center text-gray-500">You have no favorite products.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">
                @foreach($products as $product)
                    <div class="bg-gray-100 shadow-lg rounded-lg p-6 ">
                        <x-card-style :product="$product" />

                        <!-- Unfavorite Form -->
                        <form action="{{ route('products.unfavorite', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                                Unfavorite
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
