<!-- resources/views/components/product-card.blade.php -->

<div class="card">

<img src="{{ asset('storage/images/' . $image) }}" class="card-img-top" alt="{{ $name }}">
<div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p class="card-text">{{ $description }}</p>
        <p class="card-text"><strong>Price:</strong> ${{ $price }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $category }}</p>
    </div>
</div>
