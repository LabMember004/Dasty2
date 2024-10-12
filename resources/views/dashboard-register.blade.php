
@extends('layouts.app')
@section('content')
<div class="bg-gray-100">

<div class="max-w-md mx-auto mt-10 bg-white p-5 rounded-md shadow-md">
        <h1 class="text-xl font-semibold text-center">Register Dashboard User</h1>

        <form action="{{ route('dashboard.register.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name:</label>
                <input type="text" id="name" name="name" required class="w-full border border-gray-300 p-2 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email:</label>
                <input type="email" id="email" name="email" required class="w-full border border-gray-300 p-2 rounded">
            </div>
          
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
