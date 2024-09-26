<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Include Tailwind CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    

    <link href="/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>





</head>
<body>
    <div >
        <nav class="bg-blue-400 text-white h-8">
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
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fas fa-heart icon"></i>
                </a>
            <div class="text-white hover:text-gray-300">
                <a href="#" class="font-bold">عربي</a>
            </div>
          
           </div>
                <!-- Navigation Links -->
                <div id="nav-menu" class="lg:flex lg:items-center ">
                    <ul class="flex space-x-4">
                        <!-- Authentication Links -->
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
                                <ul id="dropdownMenu" class="absolute right-0 mt-2 hidden group-hover:block bg-gray-100 text-black py-2 w-48">
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


                

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Tailwind CSS Toggle Menu Script -->
    <script>
      function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    }

    // Optional: Close the dropdown if clicked outside of it
    document.addEventListener('click', function(event) {
        var dropdown = document.getElementById('dropdownMenu');
        var navbarDropdown = document.getElementById('navbarDropdown');

        // Check if the click was outside the dropdown or the toggle element
        if (!navbarDropdown.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
    </script>
</body>
</html>
