<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @if ($product)
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
        @else
            <p>No product found.</p>
        @endif
    </div>
</body>
</html>
