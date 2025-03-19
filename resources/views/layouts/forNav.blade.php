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
        <a href="{{ route('paintings') }}" class="flex items-center justify-center font-medium h-[60px] px-3 transition duration-300 
            {{ $currentRoute == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            PAINTINGS
        </a>
        <a href="{{ route('drawings') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            DRAWINGS
        </a>
        <a href="{{ route('sculptures') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'sculptures' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            SCULPTURES
        </a>
        <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            ARTISTS
        </a>
        <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[60px] px-4 transition duration-300 
            {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
            ANNOUNCMENTS
        </a>
    </div>

    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif" 
        
    <!-- Login/Register Buttons -->
    <div class="hidden md:flex space-x-4">
            @if(session()->has('user_id')) 
                <!-- User is logged in: buttons hidden -->
                <p class="px-7 py-1 text-white">{{ explode('@', session('user_email'))[0] }}!</p> <!-- so inot na name lang tigdisplay ko sa email -->
                <a href="{{ route('logout') }}" class="px-7 py-1 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">
                    LOGOUT
                </a>
            @else 
                <!-- User is not logged in: show Login/Register buttons -->
                <a id="loginbtn" href="{{ route('login') }}" class="px-7 py-1 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">LOGIN</a>
                <a href="{{ route('register') }}" class="px-7 py-1 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
            @endif
        </div>

    <!-- Mobile Menu Button -->
    <button id="menuBtn" class="md:hidden mr-[-25px] block text-[#6e4d41] focus:outline-none text-2xl">☰</button>
</nav>

<div  id="mobileMenu" class="hidden fixed inset-0 bg-white flex flex-col items-center justify-start space-y-5 shadow-md z-40 pt-10" style="font-family: 'Rubik', sans-serif;">
    @php
        $currentRoute = Route::currentRouteName();
    @endphp

    <a href="{{ route('paintings') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'paintings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        PAINTINGS
    </a>
    <a href="{{ route('drawings') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'drawings' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        DRAWINGS
    </a>
    <a href="{{ route('sculptures') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'sculptures' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        SCULPTURES
    </a>
    <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'artists' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ARTISTS
    </a>
    <a href="{{ route('artists') }}" class="flex items-center justify-center font-medium h-[50px] px-4 transition duration-300 
        {{ $currentRoute == 'announcements' ? 'text-[#6e4d41] underline underline-offset-8 decoration-2' : 'text-[#6e4d41] opacity-60 hover:text-gray-500' }}">
        ANNOUNCEMENTS
    </a>

    <a href="{{ route('login') }}" class="w-28 h-10 flex items-center justify-center bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-gray-100 transition">
        LOGIN
    </a>
    <a href="{{ route('register') }}" class="w-28 h-10 flex items-center justify-center bg-[#6e4d41] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">
        REGISTER
    </a>

    <button id="closeMenu" class="absolute top-3 right-4 text-2xl text-gray-800">
        &times;
    </button>
</div>



</body>
</html>