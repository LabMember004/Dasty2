<div >
<div class=" mt-[-16px]" >
        <nav class="bg-blue-400 text-white h-8 ">
            <div class="container mx-auto flex items-center justify-between ">
            <div class="flex space-x-4  mt-1 ml-60 ">
                <a href="#" class="text-white hover:text-gray-300 ">
                    <i class="fab fa-facebook icon"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-whatsapp icon"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-instagram icon"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-snapchat icon"></i>
                </a>
                        <a href="{{route('products.favorites')}}" class="text-white hover:text-gray-300">
                            <i class="fas fa-heart icon"></i>
                        </a>
            
          
           </div>
                <div id="nav-menu" class="lg:flex lg:items-center ">
                    <ul class="flex space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="text-white hover:text-gray-300" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="text-white hover:text-gray-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="relative">
                                <a id="navbarDropdown" class="cursor-pointer" onclick="toggleDropdown()">
                                <i class="fa-solid fa-caret-down"></i>  
                                   {{ Auth::user()->name }} ,slaw
                                    <i class="fa-regular fa-user"></i>                               
                                 </a>
                                <!-- Dropdown Menu -->
                                <ul id="dropdownMenu" class="absolute right-0 hidden group-hover:block bg-gray-100 text-black py-2 w-48">
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-200" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                       
                                        <a href="{{ route('products.create') }}" class="block px-4 py-2 hover:bg-gray-200">Add Product</a>
                                        <a href="{{ route('products.myProduct') }}" class="block px-4 py-2 hover:bg-gray-200">My Products</a>
                                        <a href="{{ route('products.favorites') }}" class="block px-4 py-2 hover:bg-gray-200">My Favorites</a>
                                     
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    <form class=" flex justify-between item-center w-2/4 ml-auto mr-80  " method="GET" action="{{ route('products.search') }}">
        <div class="relative w-2/4 ml-20">
            <button type="submit" class="  absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                <i class="fa-solid fa-magnifying-glass text-center mb-2"></i>
            </button>
            <input class="border-2 border-gray-300 rounded-full mt-4 pl-10 pr-4 py-2 w-full mb-5" type="text" name="query" placeholder="Search by title" value="{{ request()->input('query') }}">
        </div>
        
    </form>
</div>
