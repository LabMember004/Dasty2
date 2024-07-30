<!-- resources/views/products/welcome.blade.php -->

@extends('layouts.app') <!-- Ensure layouts.app is properly defined -->

@section('title', 'Welcome')

@section('content')
    <h1>Welcome to the Product CRUD Application</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>

    <div class="mt-5">
        <h2>Products List</h2>
        <ul class="list-group">
            @foreach ($products as $product)
                <li class="list-group-item">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                    <p>Category: {{ $product->category }}</p>
                    @if ($product->image)
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                    @endif
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
