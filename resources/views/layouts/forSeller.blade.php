<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seller Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>

    </style>
</head>
<body class="bg-white text-gray-900">
    @if(session('success'))
    <script>
        Swal.fire({
            title: "{{ session('success') }}",
            icon: "success",
            timer: 1000,
            showConfirmButton: false
        });
    </script>
    @endif

    <!-- Sidebar -->
    <nav class="fixed top-0 left-0 w-56 h-full bg-white shadow-md flex flex-col items-center py-6 z-10 hidden md:flex">
        <div class="mb-6">
            <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="h-12">
        </div>

        <div id="forNav" class="flex flex-col items-center justify-center space-y-4 w-full text-center">
            <a href="{{ route('SellerDashboard') }}" class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 {{ request()->routeIs('SellerDashboard') ? 'border-b-4 border-[#6e4d41]' : ''}}">DASHBOARD</a>
            <a href="{{ route('SellerArtworks') }}" class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 {{ request()->routeIs('SellerArtworks') ? 'border-b-4 border-[#6e4d41]' : ''}}">ARTWORKS</a>
            <a href="{{ route('SellerOrders') }}" class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 {{ request()->routeIs('SellerOrders') ? 'border-b-4 border-[#6e4d41]' : ''}}">ORDERS</a>
        </div>

        @guest
        <div class="mt-auto mb-6 flex flex-col space-y-3 w-full text-center">
            <a href="{{ route('show.login') }}" class="ml-4 mr-4 px-5 py-2 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition">LOGIN</a>
            <a href="{{ route('show.register') }}" class="ml-4 mr-4 px-5 py-2 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition">REGISTER</a>
        </div>
        @endguest

        @auth
        <div class="mt-auto mb-6 flex flex-col space-y-3 w-full text-center">
            <span id="navusername" class="text-gray-800 text-sm font-semibold">{{ Auth::user()->first_name }}</span>
        </div>

        <div class="flex items-center space-x-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300">LOGOUT</button>
            </form>
            <span class="mb-3">|</span>
            <a href="{{ route('artworks') }}" class="no-underline text-[#6e4d41] hover:text-gray-500 font-medium transition duration-300 mb-3">BUYER</a>
        </div>
        @endauth
    </nav>

    <!-- Mobile Message -->
    <div class="md:hidden text-sm text-red-500 font-semibold text-center mt-4">
        You are currently logged in as a seller using mobile. <br> For a better experience, we recommend using the Web view.
    </div>

    <!-- Main Content Wrapper -->
    <div class="md:ml-56 p-4">
        <!-- Authenticated Mobile Section -->
        @auth
        <div class="md:hidden w-full flex flex-col items-center px-4 mb-4">
            <span class="text-gray-800 text-sm font-semibold mb-2">{{ Auth::user()->first_name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="text-[#6e4d41] w-full hover:text-gray-500 font-medium py-2 transition duration-300 text-center">LOGOUT</button>
            </form>
            <a href="{{ route('home') }}" class="mt-2 text-[#6e4d41] hover:text-gray-500 font-medium transition duration-300 text-center">LOG IN AS BUYER</a>
        </div>
        @endauth

        <!-- Guest Mobile Section -->
        @guest
        <div class="md:hidden w-full flex flex-col items-center px-4 mb-4">
            <a href="{{ route('show.login') }}" class="w-full mb-2 px-5 py-2 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition text-center">LOGIN</a>
            <a href="{{ route('show.register') }}" class="w-full px-5 py-2 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition text-center">REGISTER</a>
        </div>
        @endguest

        <!-- Main Page Content Placeholder -->
        <div class="text-center text-xl mt-10">
            <!-- You can place your dashboard contents here -->
            <p>Welcome to your Seller Dashboard!</p>
        </div>
    </div>




<!-- Background Decoration -->
<div class="bgpaint opacity-45 sm:opacity-30">
    <!-- Various SVG Elements -->
    <svg id="blob3" viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path fill="#A99476" d="M344.5,254Q327,268,318.5,279.5Q310,291,329.5,341Q349,391,330.5,426Q312,461,276,399.5Q240,338,212.5,374Q185,410,166.5,388.5Q148,367,148.5,336.5Q149,306,103,302.5Q57,299,46.5,269.5Q36,240,89.5,224.5Q143,209,118.5,171.5Q94,134,135.5,143.5Q177,153,181,111Q185,69,212.5,66.5Q240,64,265.5,74Q291,84,286.5,133Q282,182,337.5,155.5Q393,129,374,166Q355,203,358.5,221.5Q362,240,344.5,254Z" />
    </svg>
    <!-- Other SVGs go here -->
</div>

</body>
</html>



    


    


    <!-- Featured Paintings 
    <section class="text-center px-10 py-16 bg-gray-100">
        <h2 class="text-4xl font-bold">Featured Paintings</h2>
        <div class="flex justify-center mt-6">
            <div class="p-4 bg-white shadow-lg rounded-lg max-w-xs">
                <img src="{{ asset('storage/featured-art.jpg') }}" alt="Wallowing Breeze" class="w-full h-80 object-cover rounded-md">
                <p class="font-semibold mt-2">Wallowing Breeze</p>
                <p class="text-gray-500">Aeron Jead Marquez</p>
                <p class="text-gray-500 text-sm">Oil on canvas, 2008</p>
            </div>
        </div>
    </section>-->
</body>
</html>
<script>
    document.getElementById("menuBtn").addEventListener("click", function () {
        let mobileMenu = document.getElementById("mobileMenu");
        mobileMenu.classList.toggle("hidden");
    });

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>
<script>
    // Detect if the user is on a mobile device
    if (window.innerWidth <= 768) {  // Adjust breakpoint as needed
        document.getElementById("mobileMessage").classList.remove("hidden");
    }
</script>