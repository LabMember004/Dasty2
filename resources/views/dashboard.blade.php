@extends('layouts.app')

@section('content')
<div class="flex">
    
    <div class="w-1/6 h-screen bg-gray-800 text-white flex flex-col items-start p-4 space-y-4 mt-[-16px]">
        <h2 class="text-2xl font-bold mb-6">Dashboard Menu</h2>
        <a  href="{{ route('welcome')}}" class="block w-full px-4 py-2">Home</a>
        <a  class="block w-full px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }} rounded">Users</a>
        <a href="{{ route('dashboard.products') }}" class="block w-full px-4 py-2 {{ request()->routeIs('dashboard.products') ? 'bg-gray-700' : 'hover:bg-gray-700' }} rounded">Products</a>
        <a  class="block w-full px-4 py-2 hover:bg-red-700 rounded"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
<div class="container mx-auto text-center w-3/4">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <div class="container  bg-gray-100 ml-10">
        <table class="w-full table-auto ">
            <thead class="border-b-2 bg-gray-200 ">
                <tr>
                    <th class=" text-2xl p-4 w-1/4">Users</th>
                    <th class=" text-2xl p-4 w-1/4">Email</th>
                    <th class=" text-2xl p-4 w-1/4">Created_at</th>
                    <th class=" text-2xl p-4 w-1/4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="text-xl p-4">{{$user->name}}</td>
                    <td class="text-xl p-4">{{$user->email}}</td>
                    <td class="text-xl p-4">{{$user->created_at}}</td>
                    <td> 
                    <form  method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onClick="return confirmDelete();" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white ">Disable</button>
                    <a href="{{route('dashboard.register') }} " class="inline-block px-4 py-2 bg-blue-700 hover:bg-blue-800 rounded text-white ">Add User</a>
                  
                </form>
                
                   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this user?');
    }
</script>

@endsection