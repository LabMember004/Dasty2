<!-- resources/views/products/myProduct.blade.php -->

@extends('layouts.app')

@section('title', 'My Products')

@section('content')
    <h1>My Products</h1>

    @if($products->isEmpty())
        <p>You haven't added any products yet.</p>
    @else
        <div class="product-group">
            @foreach($products as $product)
                <div class="product-group-item">
                    <x-card-style :product="$product" />

                    <!-- Show Edit and Delete buttons only if the user is the creator -->
                    @if (Auth::check() && Auth::id() === $product->user_id)
                        <div class="mt-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif

                    <!-- Favorite button for each product -->
                    <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-success">Favorite</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
