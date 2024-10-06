<a href="{{ route('products.show', $product->id) }}" class="block">
                        <div class= " h-full flex flex-col rounded-md overflow-hidden w-full">
                            <div class="h-60 relative">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                

                                <h3 class="absolute bottom-0 left-0 text-white text-lg font-semibold p-2 bg-opacity-50 w-full">{{ $product->name }}</h3>
                            </div>
                            <div class="p-4  flex-grow">
                                <p class="text-blue-600 text-lg">{{ Str::limit($product->description, 30) }}</p>
                                <p class="text-gray-500 font-semibold mt-2 text-xl">${{ $product->price }}</p>
                            </div>
                        </div>
                    </a>