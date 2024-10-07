<!-- resources/views/products/myProduct.blade.php -->

@extends('layouts.app')

@section('title', 'My Products')

@section('content')
<a href="{{ route('products.index') }}">
                <i class="fa-solid fa-arrow-left ml-10" style="font-size: 36px;"></i>
            </a>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">My Products</h1>

        @if($products->isEmpty())
            <p class="text-center text-gray-500">You haven't added any products yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow-lg rounded-lg p-6 relative">
                        <x-card-style :product="$product" />

                        @if (Auth::check() && Auth::id() === $product->user_id)
                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
                                        Delete
                                    </button>

                                </form>
                                
                                
                            </div>
                     
                        @endif
                               <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg w-2/4 ">
                                Favorite
                            </button>
                        </form>
                       
                    </div>
                    
                @endforeach
                
            </div>
        @endif
    </div>
@endsection
