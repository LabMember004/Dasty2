@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Left Sidebar Navbar -->
    <div class="w-1/6 h-screen bg-gray-800 text-white flex flex-col items-start p-4 space-y-4 mt-[-16px]">
        <h2 class="text-2xl font-bold mb-6">Dashboard Menu</h2>
        <a href="{{ route('welcome')}}" class="block w-full px-4 py-2 hover:bg-gray-700 rounded">Home</a>
        <a href="{{ route('dashboard')}}" class="block w-full px-4 py-2 hover:bg-gray-700 rounded">Users</a>
        <a  class="block w-full px-4 py-2 {{ request()->routeIs('dashboard.products') ? 'bg-gray-700' : 'hover:bg-gray-700' }} rounded">Products</a>
        <a  class="block w-full px-4 py-2 hover:bg-red-700 rounded"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>

    </div>
    <div class="container  bg-gray-100 ">
        <table class="w-full table-auto ">
            <thead class="border-b-2 bg-gray-200  ">
                <tr>
                    <th class=" text-2xl p-4 ">Product</th>
                    <th class=" text-2xl p-4 ">Price</th>
                    <th class=" text-2xl p-4 ">Description</th>
                    <th class=" text-2xl p-4 ">Image</th>
                    <th class=" text-2xl p-4 ">Category</th>
                    <th class=" text-2xl p-4 "> User_id</th>
                    <th class=" text-2xl p-4 ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b ">
                    <td class="text-xl p-4 ">{{$product->name}}</td>
                    <td class="text-xl p-4">{{$product->price}}</td>
                    <td class="text-xl p-4">{{ \Illuminate\Support\Str::words($product->description, 5, '...') }}</td>
                    <td class="text-xl p-4">
                                         <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded">
                        </td>
                    <td class="text-xl p-4">{{$product->category}}</td>
                    <td class="text-xl p-4">{{$product->user_id}}</td>

                    <td> 
                    <form action="{{ route('dashboard.destroyProduct', $product->id) }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="confirmDelete()" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white ">Delete</button>
                </form>
                    <a href="{{ route('products.show', $product->id) }}" class="inline-block px-4 py-2 bg-green-500 hover:bg-green-600  text-white rounded ">Show</a>

                    <a href="{{ route('products.edit', $product->id) }}" class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600  text-white rounded ">Edit</a>
                
                
                   
                    </td>
                </tr>
                @endforeach

                <script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this product?');
    }
</script>
@endsection