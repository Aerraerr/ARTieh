<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paintings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mods/paintings.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body style="font-family:rubik;" class="bg-white text-gray-900 ">

<nav style="max-width: 100%; height: 60px;" class="flex justify-between items-center px-10 py-6 shadow-sm bg-transparent">
    <div>
        <a href="{{ route('home') }}">
            <img style="max-width: 120px;" src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="mt-2 sm:ml-2 ml-[-30px] h-10 sm:h-12">
        </a>
    </div>
    <!-- Navigation Links -->
    <div id="forNav" class="hidden md:flex space-x-1" style="margin-left:300px; font-family: 'Rubik', sans-serif;">
        @php
            $currentRoute = Route::currentRouteName();
        @endphp
        <a href="{{ route('category', ['category' => 'paintings']) }}" class="flex items-center justify-center font-medium h-[60px] px-3 transition duration-300 
            {{ $currentRoute == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            PAINTINGS
        </a>
        <a href="{{ route('category', ['category' => 'drawings']) }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            DRAWINGS
        </a>
        <a href="{{ route('category', ['category' => 'sculpture']) }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'sculptures' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            SCULPTURES
        </a>
        <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            ARTISTS
        </a>
        <a href="{{ route('announcements') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            ANNOUNCMENTS
        </a>
    </div>

    <!-- Login/Register Buttons -->
        <div class="hidden md:flex space-x-4">
            @auth
                <!-- User is logged in: buttons hidden -->
                <div class="flex items-center space-x-2"> <!-- Flex container to keep elements close -->
                    <span  id="navusername" class="text-gray-800 text-sm font-semibold"> {{Auth::user()->first_name}} </span>
                    
                    <div x-data="{ open: false }" class="relative">
                    
                        <!-- Profile Image (Click to Toggle Modal) -->
                        <a href="javascript:void(0);" @click="open = !open">
                            <img src="{{ asset('images/user.png') }}" alt="profile" class="cursor-pointer w-9 h-9 rounded-full  border-2 border-[#FFE0B2]">
                        </a>

                        <!-- Floating Modal -->
                        <div 
                            x-show="open" 
                            @click.away="open = false"
                            x-transition
                            class="absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                            
                            <!-- Profile Details -->
                            <div class="flex items-center space-x-3 border-b pb-3 mb-3">
                                <img src="{{ asset('images/user.png') }}" alt="profile" class="w-12 h-12 rounded-full">
                                <div class="mt-2">
                                    <h2 class="text-sm font-semibold text-[#6e4d41]">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </h2>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email}}</p>
                                </div>
                            </div>
                            <!-- View Profile Button -->
                            <div class="flex justify-center mb-3">
                                <a href="{{ route('profile') }}" 
                                    class="w-full text-center px-4 py-2 border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition no-underline">
                                    View Profile
                                </a>
                            </div>

                        <!-- logout button-->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button ctype="submit" class="w-full px-4 py-2 bg-[#6e4d41] text-white rounded-lg hover:bg-[#A99476] transition">LOGOUT</button>
                        </form>
                </div>
            </div>      
            @endauth

            @guest
                <!-- User is not logged in: show Login/Register buttons -->
                <a id="loginbtn" href="{{ route('show.login') }}" class="px-7 py-1 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
                <a href="{{ route('show.register') }}" class="px-7 py-1 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
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

<div  id="mobileMenu" class="hidden fixed inset-0 bg-white flex flex-col items-center justify-start space-y-5 shadow-md z-40 pt-10" style="font-family: 'Rubik', sans-serif;">
    @php
        $currentRoute = Route::currentRouteName();
    @endphp

    <a href="{{ route('category', ['category' => 'paintings']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        PAINTINGS
    </a>
    <a href="{{ route('category', ['category' => 'drawings']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        DRAWINGS
    </a>
    <a href="{{ route('category', ['category' => 'sculpture']) }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'sculptures' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        SCULPTURES
    </a>
    <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ARTISTS
    </a>
    <a href="{{ route('announcements') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'announcements' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ANNOUNCEMENTS
    </a>

    <a href="{{ route('show.login') }}" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">
        LOGIN
    </a>
    <a href="{{ route('show.register') }}" class="w-28 h-10 flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">
        REGISTER
    </a>

    <button id="closeMenu" class="absolute top-3 right-4 text-2xl text-gray-800">
        &times;
    </button>
</div>




</body>
</html>