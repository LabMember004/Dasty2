@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<a href="{{ route('products.index') }}">
                <i class="fa-solid fa-arrow-left ml-10" style="font-size: 36px;"></i>
            </a>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" class="h-10 form-input w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="name" name="name" value="{{ $product->name }}" required />
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea class="form-textarea w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" class="h-10 form-input w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="price" name="price" value="{{ $product->price }}" required />
            </div>

            <div>
    <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
    <select id="category" name="category" class="form-select w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" required>
        <option value="Houses" {{ $product->category == 'Houses' ? 'selected' : '' }}>Houses</option>
        <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
        <option value="Cars" {{ $product->category == 'Cars' ? 'selected' : '' }}>Cars</option>
    </select>
</div>

            <div>
                <label for="number" class="block text-gray-700 font-medium mb-2">Number</label>
                <input type="number" class="form-input w-full h-10 bg-gray-100 border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="number" name="number" value="{{ $product->number }}" required />
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" class="form-input w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="image" name="image">
                @if ($product->image)
                    <img src="{{ asset('storage' . $product->image) }}" alt="{{ $product->name }}" class="mt-4 rounded-lg shadow-lg w-32">
                @endif
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
