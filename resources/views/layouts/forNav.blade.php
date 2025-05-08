<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paintings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link rel="website icon" type="png" href="{{ asset('images/websiteicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>[x-cloak] { display: none !important;}</style>
</head>
<body style="font-family:rubik;" class="bg-white text-gray-900 ">

<nav style="max-width: 100%; height: 60px;" class="flex justify-between items-center px-10 py-6 shadow-sm bg-transparent">
    <div>
        <a href="{{ route('home') }}">
            <img style="max-width: 130px;" src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 sm:ml-2 ml-[-30px] h-10 sm:h-12">
        </a>
    </div>
    
    <!-- Navigation Links -->
    <div id="forNav" class="hidden md:flex space-x-1" style="margin-left:200px; font-family: 'Rubik', sans-serif;">
        @php
            $currentRoute = Route::currentRouteName();
            $currentCategory = request('category');
        @endphp
        
        <a href="{{route('artworks')}}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'artworks' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            ARTWORKS
        </a>

        <a href="{{ route('category', ['category' => 'paintings']) }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'category' && $currentCategory == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            PAINTINGS
        </a>

        <a href="{{ route('category', ['category' => 'drawings']) }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'category' && $currentCategory == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            DRAWINGS
        </a>

        <a href="{{ route('category', ['category' => 'sculpture']) }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'category' && $currentCategory == 'sculpture' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            SCULPTURES
        </a>

        <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            ARTISTS
        </a>

        <a href="{{ route('announcements') }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
            {{ $currentRoute == 'announcements' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
            ANNOUNCEMENTS
        </a>
        @auth
            <a href="{{ route('cart') }}" class="flex items-center justify-center font-medium h-[50px] px-2 transition duration-300 
                {{ $currentRoute == 'cart' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-80 hover:text-gray-500' }}">
                <img class="h-12 w-12"  src="{{ asset('images/cartlogo.svg') }}" alt="cart" >
                @if ($cartItemCount > 0)
                    <span class="absolute top-1 ml-6 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        {{ $cartItemCount }}
                    </span>
                @endif
            </a>
        @endauth
    </div>


    <!-- Login/Register Buttons -->
    <div class="hidden md:flex space-x-4">
            @auth
                <!-- User is logged in: buttons hidden -->
                <div class="flex items-center space-x-2"> <!-- Flex container to keep elements close -->
                    <span  id="navusername" class="text-gray-800 text-sm font-semibold"> {{Auth::user()->first_name}} </span>
                    
                    <div x-data="{ open: false }"  class="relative z-50">
                    
                        <!-- Profile Image (Click to Toggle Modal) -->
                        <a href="javascript:void(0);" @click="open = !open">
                            <img src="{{ asset('storage/' . (Auth::user()->profile_pic ?? 'profile_pic/user.png')) }}" alt="profile" class="cursor-pointer w-9 h-9 rounded-full  border-2 border-[#FFE0B2]">
                        </a>

                        <!-- Floating Modal -->
                        <div 
                            x-show="open" 
                            @click.away="open = false"
                            x-transition x-cloak
                            class="fixed top-14 right-0 mt-2 w-80 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                            
                            <!-- Profile Details -->
                            <div class="flex items-center space-x-3 border-b pb-3 mb-3">
                                <img src="{{ asset('storage/' . (Auth::user()->profile_pic ?? 'profile_pic/user.png')) }}"  alt="profile" class="w-12 h-12 rounded-full">
                                <div class="mt-2">
                                    <h2 class="text-sm font-semibold text-[#6e4d41]">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </h2>
                                    <p class="text-xs text-gray-500 mr-6">{{ Auth::user()->email}}</p>
                                </div>
                                @if(Auth::user()->role === 'seller')
                                    <a href="{{route('SellerDashboard')}}"><img src="{{ asset('images/dashboard.svg') }}" ></a>
                                @endif
                            </div>
                            <!-- View Profile Button -->
                            <div class="flex justify-center mb-3">
                                <a href="{{ route('profile') }}" 
                                    class="w-full text-center px-4 py-2 border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition no-underline">
                                    VIEW PROFILE
                                </a>
                            </div>
                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full px-4 py-2 bg-[#6e4d41] text-white rounded-lg hover:bg-[#A99476] transition">
                                    LOGOUT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <!-- User is not logged in: show Login/Register buttons -->
                <a id="loginbtn" href="{{ route('show.login') }}" class="px-3 py-1 bg-white border border-[#6e4d41] no-underline text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
                <a href="{{ route('show.register') }}" class="px-3 py-1 bg-[#A99476] no-underline text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
            @endguest
        </div>



    <!-- Mobile Menu Button -->
    <button id="menuBtn" class="md:hidden mr-[-25px] block text-[#6e4d41] focus:outline-none text-2xl">☰</button>
</nav>

    @if(Session::has('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ Session::get('error') }}
        </div>

        <script>
            // Hide the notification after 5 seconds
            setTimeout(() => {
                document.querySelector('.fixed').style.display = 'none';
            }, 5000);
        </script>
    @endif

<!-- Mobile Navigation -->
<div  id="mobileMenu"  class="hidden   fixed inset-0 bg-white flex flex-col items-center justify-start space-y-5 shadow-md z-40  h-full" style="font-family: 'Rubik', sans-serif;">
    <div class="mt-[-50px] w-1/2" >
    @php
        $currentRoute = Route::currentRouteName();
    @endphp
    <a href="{{ route('home') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'home' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            HOME
        </a>
    <a href="{{route('artworks')}}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'artworks' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ARTWORKS
    </a>

    <a href="{{ route('category', ['category' => 'paintings']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'category' && request('category') == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        PAINTINGS
    </a>

    <a href="{{ route('category', ['category' => 'drawings']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'category' && request('category') == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        DRAWINGS
    </a>

    <a href="{{ route('category', ['category' => 'sculpture']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'category' && request('category') == 'sculpture' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        SCULPTURES
    </a>

    <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ARTISTS
    </a>

    <a href="{{ route('announcements', ['category' => 'announcements']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'announcements' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ANNOUNCEMENTS
    </a>
     @auth
            <a href="{{ route('cart') }}" class="flex items-center justify-center font-medium h-[50px] px-3 transition duration-300 
                {{ $currentRoute == 'cart' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
                <img src="{{ asset('images/Cart.svg') }}" alt="cart" class="w-[30px] h-[40px]">
                @if ($cartItemCount > 0)
                    <span class="absolute top-[56%] ml-6 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        {{ $cartItemCount }}
                    </span>
                @endif
            </a>
        @endauth
    <hr class="w-3/4 border-t border-[#6e4d41] my-5 mx-auto">
    
    <div class="flex flex-col items-center space-y-2 md:hidden w-full">
    @auth
        <!-- Display user email or name -->
        <span style="color:#6e4d41;" id="navusername" class="w-full  text-sm"> {{ explode('@', Auth::user()->email)[0] }} @gmail.com </span>
        <!-- View Profile Button -->
        <div class="flex justify-center mb-3 w-full">
            <a href="{{ route('profile') }}" class="w-full text-center px-4 py-2 border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#6e4d41] hover:text-white transition">
                VIEW PROFILE
            </a>
        </div>
        <!-- Logout Button -->
        <form style="margin-top:-10px;" action="{{ route('logout') }}" method="POST" class="w-full  flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">
            @csrf
            <button class=" btn text-white">LOGOUT</button>
        </form>
    @endauth

    @guest
        <!-- Login Button -->
        <a href="{{ route('show.login') }}" class="w-1/2 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">
            LOGIN
        </a>
        
        <!-- Register Button -->
        <a href="{{ route('show.register') }}" class="w-full h-10 flex items-center justify-center bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">
            REGISTER
        </a>
    @endguest
</div>

    <button id="closeMenu" class="absolute top-2 right-4 text-2xl text-gray-800">
        &times;
    </button>
    </div>
</div>




</body>
</html>