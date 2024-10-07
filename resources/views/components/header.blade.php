<div>
    <form class=" flex justify-between item-center w-2/4 ml-auto mr-80  mt-[-15px] " method="GET" action="{{ route('products.search') }}">
        <div class="relative w-2/4 ml-20">
            <button type="submit" class="  absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                <i class="fa-solid fa-magnifying-glass text-center mb-2"></i>
            </button>
            <input class="border-2 border-gray-300 rounded-full mt-4 pl-10 pr-4 py-2 w-full mb-5" type="text" name="query" placeholder="Search by title" value="{{ request()->input('query') }}">
        </div>
        
    </form>
</div>
