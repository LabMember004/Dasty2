<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <x-header />
  
  <x-filter />

  <div class="bg-gray-100 h-12 flex items-center px-4  ">

  <div class="container  flex justify-between">
  <a href="{{ route('products.index') }}" >
    <i class="fa-solid fa-arrow-left" style="font-size: 36px;"></i>
</a>
<div class="  flex items-center text-gray-600 text-lg ">
        
        <!-- Home Icon -->
        <a href="{{ url('/') }}" class="mr-4">
            <i class="fa-solid fa-house"></i>
        </a>
        
        <!-- Breadcrumb Links -->
        <a href="{{ route('products.index') }}" class="hover:text-blue-500">
            Products
        </a>
        <span class="mx-2">/</span>
        
 
        
        <!-- Current Product or Page -->
        <span class="text-gray-500">
            Corolla 2024
        </span>
        
    </div>


</div>
    
  </div>
    
    <div class="container border-2 border-green-500 flex justify-between ">
        <div class=" w-[350px] bg-gray-100">
        <p class="text-gray-500 text-lg p-2"> Price </p>
        <p class="text-red-500 text-lg p-2"> ${{ number_format($product->price, 2) }}</p>
        <i class="fa-solid fa-user p-2 "  style="font-size: 48px;"></i>
        <a href="{{ route('products.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white text-lg rounded hover:bg-blue-600 "> Look at other products </a>
        <div class="bg-green-600 text-white h-24 flex flex-col items-center justify-center mt-2">
        <p> Call the seller </p>
        <p>07706534343</p>
        </div>
        <div class="max-w-sm mx-auto bg-white border rounded-lg shadow-md overflow-hidden">
    <div class="p-4 text-center">
        <p class="text-xl font-bold text-green-500">#1306739</p>
    </div>
    <ul>
        <li class="flex items-center justify-between p-4 border-t">
            <span>Slemani </span>
            <i class="fa-solid fa-location-dot"></i>
        </li>
        <li class="flex items-center justify-between p-4 border-t">
            <span>Second Hand</span>
            <i class="fa-solid fa-gear"></i>
        </li>
        <li class="p-4 border-t flex justify-end">
        <i class="fa-solid fa-star"></i>

        </li>
        <li class="flex items-center justify-between p-4 border-t">
            <span> 3 hours ago</span>
            <i class="fa-solid fa-clock"></i>
        </li>
        <li class="flex items-center justify-between p-4 border-t">
            <span>30 days left</span>
            <i class="fa-solid fa-stopwatch"></i>
        </li>
    </ul>
</div>


        </div>

        <div class="border-2 border-black flex-1   ">

        <h2 class="text-4xl flex justify-end px-4 py-2 ">{{ $product->name ?? "" }}</h2>
        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-[800px] h-[500px] rounded-lg mx-auto ">
        <p class="text-4xl flex justify-end px-4 py-2">{{ $product->description }}</p>
       
    
        
        @if (Auth::check() && Auth::id() === $product->user_id)
            <a href="{{ route('products.edit', $product->id) }}" class="">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="">
                @csrf
                @method('DELETE')
                <button type="submit" class="">Delete</button>
            </form>
        @endif
        <div class="border-2 border-yellow-500 h-16 flex bg-gray-100 ">
        <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="h-12 inline-block px-4 py-2 bg-red-500 text-white text-lg rounded hover:bg-red-600 m-2">
            @csrf
            <i class="fa-regular fa-heart"></i> <button type="submit" class="">Favorite</button>
        </form>
        <form action="" method="POST" class="inline-block px-4 py-2 bg-yellow-500 text-white text-lg rounded hover:bg-yellow-600 h-12 m-2">
            @csrf
            <i class="fa-solid fa-bullhorn"></i>  <button type="submit" class="">Make it VIP</button>
        </form>
        <form action="" method="POST" class="inline-block px-4 py-2 bg-gray-500 text-white text-lg rounded hover:bg-gray-600 h-12 m-2">
            @csrf
            <i class="fa-solid fa-flag"></i> <button type="submit" class="">Report</button>
        </form>
        
        </div>
       </div>
    </div>

    
@endsection
