<div class="flex justify-between items-center border-y-2   border-gray-200 h-12 text-lg  ">
    <div class="flex mr-auto ml-auto justify-between w-3/5 items-center ">
        <a href="{{ route('welcome') }}" class="hover:text-blue-400">All</a>
        <a href="{{ route('products.filter', 'Cars') }}" class="hover:text-blue-400" >Cars</a>
        <a href="{{ route('products.filter', 'Electronics') }}" class="hover:text-blue-400" >Electronics</a>
        <a href="{{ route('products.filter', 'Houses') }}" class="hover:text-blue-400" >Houses</a>
       

        </div>
    </div>