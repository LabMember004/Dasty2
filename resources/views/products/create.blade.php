@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<a href="{{ route('products.index') }}">
                <i class="fa-solid fa-arrow-left ml-10" style="font-size: 36px;"></i>
            </a>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Product</h2>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2 ">Name</label>
                <input type="text" class="form-input w-full h-10 bg-gray-100 border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="name" name="name " required>
            </div>

            <!-- Description Input -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea class="form-textarea w-full bg-gray-100 border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Price Input -->
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" class="h-10 form-input w-full border-gray-300 bg-gray-100 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="price" name="price" required>
            </div>

            <!-- Image Input -->
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" class="form-input w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="image" name="image">
            </div>

            <!-- Category Input -->
            <div>
                <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
                <select class="bg-gray-100 h-10 form-select w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" id="category" name="category" required>
                    <option value="Cars">Cars</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Houses">Houses</option>
                </select>
            <div class="flex justify-end mt-4">

            <button type="submit" class=" bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                Create Product
            </button>
        </form>
            </div>
    </div>
@endsection
