<!-- resources/views/products/welcome.blade.php -->


@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <x-header />
  
    <x-filter />
   
    <div class="flex border-2 items-center border-black w-1/4 justify-between mr-auto ml-auto h-12">
    <a href="" class="inline-block px-6 py-3 font-semibold rounded-lg bg-gray-100  hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition duration-200">Newest Items</a>
    <a href="" class="inline-block px-6 py-3 bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 trasition duration-200">My Items</a>
    <a href="" class="inline-block px-6 py-3 bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 trasition duration-200">Add Items</a>
</div>
    <div class="mt-10">
        <div class="product-group">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product->id) }}" class="product-group-item" style="text-decoration: none; color: inherit;">
                    <div class="product-card">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ Str::limit($product->description, 30) }}</p>
                        <p> ${{ $product->price }}</p>
                        <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-success">Favorite</button>
                        </form>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection