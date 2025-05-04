<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seller Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>

    </style>
</head>
<body class="bg-white text-gray-900">

<nav class="fixed left-0 top-0 w-56 h-full bg-white shadow-md flex flex-col items-center py-6">

    <!-- Logo -->
    <div class="mb-6">
        <img src="{{ asset('images/ARTiehlogo.png') }}" alt="ARTieh" class="h-12">
    </div>

    <!-- Growable content wrapper -->
    <div class="flex-1 w-full flex flex-col items-center justify-start">
        <!-- Navigation Links -->
        <div id="forNav" class="flex flex-col items-center space-y-4 w-full text-center">
            <a href="{{ route('SellerDashboard') }}" 
               class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 
                      {{ request()->routeIs('SellerDashboard') ? 'border-b-4 border-[#6e4d41]' : '' }} 
                      sm:block hidden">
               DASHBOARD
            </a>
            <a href="{{ route('SellerArtworks') }}" 
               class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 
                      {{ request()->routeIs('SellerArtworks') ? 'border-b-4 border-[#6e4d41]' : '' }} 
                      sm:block hidden">
               ARTWORKS
            </a>
            <a href="{{ route('SellerOrders') }}" 
               class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 
                      {{ request()->routeIs('SellerOrders') ? 'border-b-4 border-[#6e4d41]' : '' }} 
                      sm:block hidden">
               ORDERS
            </a>
            <a href="{{ route('SellerChat') }}" 
               class="menu-link text-[#6e4d41] w-[100px] hover:text-gray-500 font-medium py-3 transition duration-300 
                      {{ request()->routeIs('SellerChat') ? 'border-b-4 border-[#6e4d41]' : '' }} 
                      sm:block hidden">
               CHATS
            </a>

            <!-- Mobile Message -->
            <div id="mobileMessage" class="hidden text-sm text-red-500 font-semibold mt-4">
                You are currently logged in as a seller using mobile. <br> For a better experience, we recommend using the Web view.
            </div>
        </div>
    </div>

    <!-- Authenticated User Section -->
    @auth
    <div class="w-full flex flex-col items-center px-4 mb-4">
        <span id="navusername" class="text-gray-800 text-sm font-semibold mb-2">{{ Auth::user()->first_name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="text-[#6e4d41] w-full hover:text-gray-500 font-medium py-2 transition duration-300 text-center">LOGOUT</button>
        </form>
        <a href="{{ route('home') }}" class="mt-2 text-[#6e4d41] hover:text-gray-500 font-medium transition duration-300 text-center">LOG IN AS BUYER</a>
    </div>
    @endauth

    <!-- Guest User Section -->
    @guest
    <div class="w-full flex flex-col items-center px-4 mb-4">
        <a href="{{ route('show.login') }}" class="w-full mb-2 px-5 py-2 bg-white border border-[#6e4d41] text-[#6e4d41] rounded-lg hover:bg-[#A99476] hover:text-white transition text-center">LOGIN</a>
        <a href="{{ route('show.register') }}" class="w-full px-5 py-2 bg-[#A99476] text-white rounded-lg hover:bg-gray-200 hover:text-[#6e4d41] transition text-center">REGISTER</a>
    </div>
    @endguest

</nav>





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