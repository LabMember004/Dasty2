@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <x-header />
  
    <x-filter />
   


    <div class=" container mt-8 ">
        <div class="flex items-start gap-10  mx-auto mt-12 ">
            <div class="product-group grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 flex-1 ">
            <div class="flex border-2 items-center  col-span-full gap-5 ">
        <a href="" class="inline-block px-4 py-2 font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition duration-200">
            Newest Items
        </a>
        <a href="" class="inline-block px-4 py-2 text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 transition duration-200">
            My Items <i class="fa-solid fa-bars"></i>
        </a>
        <a href="" class="inline-block px-4 py-2 bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 transition duration-200">
            Add Items <i class="fa-solid fa-plus"></i>
        </a>
    </div>
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product->id) }}" class="block">
                        <div class="bg-gray-600 shadow-lg hover:shadow-2xl transition h-full flex flex-col rounded-md overflow-hidden w-full">
                            <div class="h-60 relative">
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                <h3 class="absolute bottom-0 left-0 text-white text-lg font-semibold p-2 bg-gray-900 bg-opacity-50 w-full">{{ $product->name }}</h3>
                            </div>
                            <div class="p-4 bg-gray-100 flex-grow">
                                <p class="text-blue-600 text-lg">{{ Str::limit($product->description, 30) }}</p>
                                <p class="text-gray-500 font-semibold mt-2 text-xl">${{ $product->price }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
           
                
                <x-vip-section :products="$products" />
           
        </div>
      
        
    </div>
@endsection
