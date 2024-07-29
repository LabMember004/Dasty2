<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Product CRUD</title>
</head>
<body>
    <div class="container mt-5">
      

        <!-- Display Products -->
        <div class="mt-5">
            <h2>Products List</h2>
            <ul class="list-group">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <p>Price: ${{ $product->price }}</p>
                        <p>Category: {{ $product->category }}</p>
                        @if ($product->image)
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                        @endif
                        <form action="/products/{{ $product->id }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="submit" class="btn btn-warning">Update</button>

                        </form>
                       
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
