@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <div>
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image">
        </div>
        <div>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
        </div>
        <button type="submit">Create Product</button>
    </form>
@endsection
