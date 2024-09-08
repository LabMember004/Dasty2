@extends('layouts.app')

@section('title', 'My Products')

@section('content')
    <h1>My Products</h1>

    @if($products->isEmpty())
        <p>You haven't added any products yet.</p>
    @else
        <div class="product-group">
            @foreach($products as $product)
                <div class="product-group-item">
                    <x-card-style :product="$product" />
                </div>
            @endforeach
        </div>
    @endif
@endsection
