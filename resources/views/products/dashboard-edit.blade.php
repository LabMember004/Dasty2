@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center">
    <h1 class="text-3xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('dashboard.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-left">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="border rounded px-4 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-left">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="border rounded px-4 py-2 w-full" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-700 hover:bg-green-800 rounded text-white">Update</button>
    </form>
</div>
@endsection
