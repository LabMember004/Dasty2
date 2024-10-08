@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <div class="container  bg-gray-100">
        <table class="w-full table-auto">
            <thead class="border-b-2 bg-gray-200">
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
                    <form action="{{ route('dashboard.destroy', $user->id) }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onClick="return confirmDelete();" class="inline-block px-4 py-2 bg-red-700 hover:bg-red-800 rounded text-white ">Delete</button>
                    <a href="{{route('dashboard.edit' , $user->id) }}" class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600  text-white rounded ">Edit</a>
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