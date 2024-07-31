<div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p>{{ Str::limit($product->description, 30) }}</p> 
        <p class="card-text"> {{ $product->price}}</p>
    </div>
</div>
