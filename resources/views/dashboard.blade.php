@extends('layouts.app')

@section('content')
<div>
    <div class="mt-[-16px]">
        <nav class="bg-blue-400 text-white h-8">
            <div class="container mx-auto flex items-center justify-between">
                <div id="nav-menu" class="lg:flex lg:items-center ml-auto"> 
                    <ul class="flex space-x-4">
                        @if (Auth::guard('dashboard')->check()) 
                            <li class="relative">
                                <a id="navbarDropdown" class="cursor-pointer" onclick="toggleDropdown()">
                                    <i class="fa-solid fa-caret-down"></i>  
                                    {{ Auth::guard('dashboard')->user()->name }}
                                    <i class="fa-regular fa-user"></i>
                                </a>
                                <ul id="dropdownMenu" class="absolute right-0 hidden group-hover:block bg-gray-100 text-black py-2 w-48">
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-200" href="{{ route('dashboard.logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a href="{{ route('dashboard.password.change') }}" class="block px-4 py-2 hover:bg-gray-200">Change Password</a> 
                                        <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                      
                            <li>
                                <span class="text-white">Not logged in</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



<div class="flex">
    
    <div class="w-1/6 h-screen bg-gray-800 text-white flex flex-col items-start p-4 space-y-4 mt-[-32px]">
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
    <h1 class="text-3xl font-bold mb-4">Dashboard Users</h1>

    <div class="container bg-gray-100 ml-10">
        <table class="w-full table-auto">
            <thead class="border-b-2 bg-gray-200">
                <tr>
                    <th class="text-2xl p-4 w-1/4">Users</th>
                    <th class="text-2xl p-4 w-1/4">Email</th>
                    <th class="text-2xl p-4 w-1/4">Created_at</th>
                    <th class="text-2xl p-4 w-1/4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dashboardUsers as $dashboardUser)
                <tr class="border-b">
                    <td class="text-xl p-4">{{ $dashboardUser->name }}</td>
                    <td class="text-xl p-4">{{ $dashboardUser->email }}</td>
                    <td class="text-xl p-4">{{ $dashboardUser->created_at }}</td>
                    <td>
                        <form method="POST" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onClick="return confirmDelete();" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white">Disable</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h1 class="text-3xl font-bold mb-4 mt-8">All Users</h1>

    <div class="container bg-gray-100 ml-10">
        <table class="w-full table-auto">
            <thead class="border-b-2 bg-gray-200">
                <tr>
                    <th class="text-2xl p-4 w-1/4">Users</th>
                    <th class="text-2xl p-4 w-1/4">Email</th>
                    <th class="text-2xl p-4 w-1/4">Created_at</th>
                    <th class="text-2xl p-4 w-1/4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="text-xl p-4">{{ $user->name }}</td>
                    <td class="text-xl p-4">{{ $user->email }}</td>
                    <td class="text-xl p-4">{{ $user->created_at }}</td>
                    <td>
                        <form method="POST" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onClick="return confirmDelete();" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white">Disable</button>
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