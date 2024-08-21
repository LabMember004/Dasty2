@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="container mt-5">
        <h2>Create Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
            <option value="Cars">Cars</option>
            <option value="Electronics">Electronics</option>
            <option value="Houses">Houses</option>
    </select>
</div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
