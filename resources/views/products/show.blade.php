@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <x-header />
  
    <x-filter />

    <div class="bg-gray-100 h-12 flex items-center px-4">
        <div class="container flex justify-between">
            <a href="{{ route('products.index') }}">
                <i class="fa-solid fa-arrow-left" style="font-size: 36px;"></i>
            </a>
            <div class="flex items-center text-gray-600 text-lg">
                <a href="{{ url('/') }}" class="mr-4">
                    <i class="fa-solid fa-house"></i>
                </a>
                <a href="{{ route('products.index') }}" class="hover:text-blue-500">Products</a>
                <span class="mx-2">/</span>
                <span class="text-gray-500">{{ $product->name }}</span>
            </div>
        </div>
    </div>
    
    <div class="container flex justify-between mt-4">
        <div class="w-[350px] bg-gray-100">
            <p class="text-gray-500 text-lg p-2">Price</p>
            <p class="text-red-500 text-lg p-2">${{ number_format($product->price, 2) }}</p>
            <i class="fa-solid fa-user p-2" style="font-size: 48px;"></i>
            <a href="{{ route('products.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white text-lg rounded hover:bg-blue-600">
                Look at other products
            </a>
            <div class="bg-green-600 text-white h-24 flex flex-col items-center justify-center mt-2">
                <p>Call the seller</p>
                <p>07706534343</p>
            </div>
            <div class="max-w-sm mx-auto bg-white border rounded-lg shadow-md overflow-hidden">
                <div class="p-4 text-center">
                    <p class="text-xl font-bold text-green-500">#1306739</p>
                </div>
                <ul>
                    <li class="flex items-center justify-between p-4 border-t">
                        <span>Slemani</span>
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
                        <span>3 hours ago</span>
                        <i class="fa-solid fa-clock"></i>
                    </li>
                    <li class="flex items-center justify-between p-4 border-t">
                        <span>30 days left</span>
                        <i class="fa-solid fa-stopwatch"></i>
                    </li>
                </ul>
            </div>
        </div>

        <div class=" flex-1 bg-gray-100">
            <h2 class="text-4xl flex justify-end px-4 py-2">{{ $product->name ?? "" }}</h2>
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-[800px] h-[500px] rounded-lg mx-auto">
            <p class="text-4xl flex justify-end px-4 py-2">{{ $product->description }}</p>
            
            @if (Auth::check() && Auth::id() === $product->user_id)
            <div class="flex gap-4 ml-2">
                <a href="{{ route('products.edit', $product->id) }}" class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600  text-white rounded ">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white ">Delete</button>
                </form>
                </div>
            @endif
            <div class=" h-16 flex bg-gray-100">
                <form action="{{ route('products.favorite', $product->id) }}" method="POST" class="h-12 inline-block px-4 py-2 bg-green-500 text-white text-lg rounded hover:bg-green-600 m-2">
                    @csrf
                    <i class="fa-regular fa-heart"></i> <a href="{{ route('products.create') }}" class="">Favorite</a>
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
<!-- VIP SECTION -->
    <div class="container overflow-x-hidden w-2/4">
    <div class="swiper-container ">
        <div class="swiper-wrapper">
            @foreach($products as $product)
            <div class="swiper-slide">
                <a href="{{ route('products.show', $product->id) }}" class="block">
                    <div class="bg-gray-200 shadow-lg hover:shadow-2xl transition h-full flex flex-col rounded-md overflow-hidden w-full relative mt-6">
                        <div class="h-60 relative">
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            <i class="fa-solid fa-crown absolute top-0 right-0 text-white font-bold px-2 py-1 rounded-bl-lg h-12 w-12 bg-yellow-400"></i> 
                            <h3 class="absolute bottom-0 left-0 text-white text-lg font-semibold p-2 bg-gray-900 bg-opacity-50 w-full">{{ $product->name }}</h3>
                        </div>
                        <div class="p-4 bg-gray-100 flex-grow text-right">
                            <p class="text-blue-600 text-lg">{{ Str::limit($product->description, 30) }}</p>
                            <p class="text-gray-500 font-semibold mt-2 text-xl">${{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <!-- Swiper Pagination: ensure it's outside the swiper-wrapper for proper placement -->
        <div class="swiper-pagination"></div>
    </div>
</div>
        <h1 class="container text-2xl text-center"> Related Components</h1>
            <div class=" grid grid-cols-3 gap-4 container w-2/4">
@foreach($relatedProducts as $product)
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
           

               
           
        </div>
    </div>

        <x-footer />
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>
@endsection
