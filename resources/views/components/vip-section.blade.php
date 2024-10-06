<div class="product-group grid grid-cols-1 gap-4 w-[350px]">
    @foreach($products as $product)
        @if($product->is_vip == 1)
            <a href="{{ route('products.show', $product->id) }}" class="block">
                <div class="bg-gray-200 shadow-lg hover:shadow-2xl transition h-full flex flex-col rounded-md overflow-hidden w-full relative">
                    <div class="h-60 relative">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">

                        <i class="fa-solid fa-crown absolute top-0 right-0 text-white font-bold px-2 py-1 rounded-bl-lg h-12 w-12 bg-yellow-400"></i>

                        <h3 class="absolute bottom-0 left-0 text-white text-lg font-semibold p-2 bg-gray-900 bg-opacity-50 w-full">{{ $product->name }}</h3>
                    </div>
                    <div class="p-4 bg-gray-100 flex-grow text-right">
                        <p class="text-blue-600 text-lg">{{ Str::limit($product->description, 30) }}</p>
                        <p class="text-gray-500 font-semibold mt-2 text-xl">${{ $product->price }}</p>
                    </div>
                </div>
            </a>
        @endif
    @endforeach
</div>
